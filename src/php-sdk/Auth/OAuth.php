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
     * @var string
     */
    private $credentialsKey;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var TokenStorageInterface
     */
    private $storage;

    /**
     * @param Client                $client
     * @param string                $clientId
     * @param string                $clientSecret
     * @param TokenStorageInterface $storage
     */
    public function __construct(Client $client, $clientId, $clientSecret, TokenStorageInterface $storage = null)
    {
        $this->client = $client;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->storage = $storage ?: new InMemoryTokenStorage();
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
        $this->requestAccessToken(self::GRANT_CLIENT_CREDENTIALS);
    }

    /**
     * Logout.
     */
    public function logout()
    {
        $this->storage->remove($this->credentialsKey);
        $this->credentialsKey = null;
    }

    /**
     * @return string
     */
    public function getCredentialsKey()
    {
        return $this->credentialsKey;
    }

    /**
     * @param string $credentialsKey
     */
    public function setCredentialsKey($credentialsKey)
    {
        $this->credentialsKey = $credentialsKey;
    }

    /**
     * @return array
     */
    public function getToken()
    {
        if ($this->hasToken()) {
            return $this->storage->get($this->credentialsKey);
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasToken()
    {
        return ($this->credentialsKey !== null || $this->storage->has($this->credentialsKey));
    }

    /**
     * @return null|string
     *
     * @throws \OAuthException
     */
    public function getAccessToken()
    {
        if (!$this->hasToken()) {
            $this->login();
        } else if (!$this->checkLifetime()) {
            $this->requestAccessToken(self::GRANT_REFRESH, [
                'refresh_token' => $this->getToken()['refresh_token'],
            ]);
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

        return new \DateTime() < (new \DateTime())->modify("+ {$this->getToken()['lifetime']} seconds");
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

        $credentialsKey = md5(json_encode($credentials));

        $response = $this->client->request()->execute('GET', self::TOKEN_ENDPOINT, $credentials, [], [
            'anonymous' => true,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new OAuthException($response);
        }
        $this->credentialsKey = $credentialsKey;
        $data = json_decode($response->getContent(), true);

        $this->storage->save($this->credentialsKey, [
            'access_token' => $data['access_token'],
            'refresh_token' => isset($data['refresh_token']) ? $data['refresh_token'] : null,
            'lifetime' => isset($data['expires_in']) ? $data['expires_in'] : null,
        ]);
    }
}
