<?php

namespace MR\SDK\Auth;

use MR\SDK\Client;
use MR\SDK\Exceptions\OAuthException;
use MR\SDK\TokenStorage\InMemoryTokenStorage;
use MR\SDK\TokenStorage\TokenStorageInterface;

class OAuth
{
    const TOKEN_ENDPOINT = '/oauth/v2/token';

    const GRANT_REFRESH = 'refresh_token';
    const GRANT_PASSWORD = 'password';
    const GRANT_EXTERNAL = 'urn:external';
    const GRANT_CLIENT_CREDENTIALS = 'client_credentials';

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var TokenStorageInterface
     */
    private $storage;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param Client                $client
     * @param string                $clientId
     * @param string                $clientSecret
     * @param TokenStorageInterface $storage
     * @param array                 $options
     */
    public function __construct(Client $client, $clientId, $clientSecret, TokenStorageInterface $storage = null, $options = [])
    {
        $this->client = $client;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->storage = $storage ?: new InMemoryTokenStorage();
        $this->logger = $client->getLogger();
    }

    /**
     * @param $email
     * @param $password
     *
     * @return array
     *
     * @throws OAuthException
     */
    public function loginWithCredentials($email, $password)
    {
        $this->logMessage('Logging in with credentials', [
            'grant_type' => self::GRANT_PASSWORD,
            'username' => $email,
        ]);

        $this->requestAccessToken(self::GRANT_PASSWORD, [
            'username' => $email,
            'password' => $password,
        ]);
    }

    /**
     * @param $type
     * @param $token
     *
     * @return array
     *
     * @throws OAuthException
     */
    public function loginWithExternalToken($type, $token)
    {
        $this->logMessage('Logging in with external token', [
            'grant_type' => self::GRANT_EXTERNAL,
            'type' => $type,
            'token' => $token,
        ]);

        $this->requestAccessToken(self::GRANT_EXTERNAL, [
            'type' => $type,
            'token' => $token,
        ]);
    }

    /**
     * Login as client.
     */
    public function login()
    {
        $this->logMessage('Logging in as client', [
            'grant_type' => self::GRANT_CLIENT_CREDENTIALS,
        ]);

        $this->requestAccessToken(self::GRANT_CLIENT_CREDENTIALS);
    }

    /**
     * Logout.
     */
    public function logout()
    {
        $this->storage->remove($this->client->getSessionId());

        $this->logMessage('Logging out');
    }

    /**
     * @return array
     */
    public function getToken()
    {
        if ($this->hasToken()) {
            return $this->storage->get($this->client->getSessionId());
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasToken()
    {
        return $this->storage->has($this->client->getSessionId());
    }

    /**
     * @return null|string
     *
     * @throws \OAuthException
     */
    public function getAccessToken()
    {
        if (!$this->hasToken()) {
            $this->logMessage('User does not have an token. Logging in ...');

            $this->login();
        } elseif (!$this->checkLifetime()) {
            $token = $this->getToken();
            $this->logMessage('Token has expired');

            if ($token['refresh_token']) {
                $this->requestAccessToken(self::GRANT_REFRESH, [
                    'refresh_token' => $token['refresh_token'],
                ]);
                $this->logMessage('Refreshing token', [
                    'old_token' => $token,
                ]);
            } else {
                $this->logMessage('User does not have an refresh token. Logging in ...');
                $this->login();
            }
        }

        return $this->getToken()['access_token'];
    }

    /**
     * @return bool
     *
     * @throws OAuthException
     */
    public function checkLifetime()
    {
        if (!$this->hasToken()) {
            throw new \LogicException('No token is registered.');
        }

        return time() < $this->getToken()['expires_at'];
    }

    /**
     * @param string $grant
     * @param array  $credentials
     *
     * @return array
     *
     * @throws OAuthException
     */
    private function requestAccessToken($grant, array $credentials = [])
    {
        $credentials = array_merge([
            'grant_type' => $grant,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ], $credentials);

        $this->logMessage('Generating new credentials key', [
            'session_id_name' => $this->client->getSessionId(),
            'credentials' => $credentials,
        ]);

        $response = $this->client->request()->execute('GET', self::TOKEN_ENDPOINT, $credentials, [], [
            'anonymous' => true,
        ]);

        if ($response->getStatusCode() !== 200) {
            $this->logMessage('Error when getting token', [
                'error' => (string) $response->getContent(),
            ]);

            throw new OAuthException($response);
        }

        $data = json_decode($response->getContent(), true);

        $isSaved = $this->storage->save($this->client->getSessionId(), [
            'access_token' => $data['access_token'],
            'refresh_token' => isset($data['refresh_token']) ? $data['refresh_token'] : null,
            'expires_at' => isset($data['expires_in']) ? time() + $data['expires_in'] : null,
        ]);

        $this->logMessage('Saving access token', [
            'is_saved' => $isSaved,
            'access_token' => $data['access_token'],
            'refresh_token' => isset($data['refresh_token']) ? $data['refresh_token'] : null,
            'expires_at' => isset($data['expires_in']) ? time() + $data['expires_in'] : null,
            'expires_in' => isset($data['expires_in']) ? $data['expires_in'] : null,
        ]);
    }

    /**
     * Log message.
     *
     * @param $message
     * @param $params
     */
    private function logMessage($message, $params = [])
    {
        if (null !== $this->logger) {
            $this->logger->info($message, array_merge($params, [
                'session_id' => $this->client->getSessionId(),
                'token' => $this->getToken(),
            ]));
        }
    }
}
