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
    private $accessToken;

    /**
     * @var string
     */
    private $accessTokenLifetime;

    /**
     * @var string
     */
    private $refreshToken;

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
        return $this->requestAccessToken(self::GRANT_PASSWORD, [
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
        return $this->requestAccessToken(self::GRANT_EXTERNAL, [
            'type' => $type,
            'token' => $token,
        ]);
    }

    /**
     * Login as client.
     */
    public function login()
    {
        return $this->requestAccessToken(self::GRANT_CLIENT_CREDENTIALS);
    }

    /**
     * Logout.
     */
    public function logout()
    {
        $this->accessToken = null;
        $this->accessTokenLifetime = null;
        $this->refreshToken = null;
    }

    /**
     * @param $accessToken
     *
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @param mixed $accessTokenLifetime
     *
     * @return $this
     */
    public function setAccessTokenLifetime($accessTokenLifetime)
    {
        $this->accessTokenLifetime = $accessTokenLifetime;

        return $this;
    }

    /**
     * @param $refreshToken
     *
     * @return $this
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * @return null|string
     *
     * @throws \OAuthException
     */
    public function getAccessToken()
    {
        if ($this->accessToken === null) {
            return null;
        }

        if (!$this->checkLifetime()) {
            return $this->requestAccessToken(self::GRANT_REFRESH, [
                'refresh_token' => $this->refreshToken,
            ]);
        }

        return $this->accessToken;
    }

    /**
     * @return bool
     */
    private function checkLifetime()
    {
        return new \DateTime() < $this->accessTokenLifetime;
    }

    /**
     * @param string $grant
     * @param array  $options
     *
     * @return array
     *
     * @throws OAuthException
     */
    private function requestAccessToken($grant, array $options = [])
    {
        $data = $this->doRequestAccessToken($grant, $options);

        $now = new \DateTime();
        $this->accessToken = array_key_exists('access_token', $data) ? $data['access_token'] : null;
        $this->refreshToken = array_key_exists('refresh_token', $data) ? $data['refresh_token'] : null;
        $this->accessTokenLifetime = array_key_exists('expires_in', $data)
            ? $now->modify("+ {$data['expires_in']} seconds")
            : null;

        return [
            'accessToken' => $this->accessToken,
            'refreshToken' => $this->refreshToken,
            'accessTokenLifetime' => $this->accessTokenLifetime,
        ];
    }

    /**
     * @param $grant
     * @param array $options
     *
     * @return mixed|null
     *
     * @throws OAuthException
     */
    private function doRequestAccessToken($grant, array $options)
    {
        $parameters = array_merge([
            'grant_type' => $grant,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ], $options);

        $key = md5(json_encode($parameters));

        if (null !== $data = $this->storage->get($key)) {
            return json_decode($data, true);
        }

        $response = $this->client->request()->get(self::TOKEN_ENDPOINT, $parameters);

        if ($response->getStatusCode() !== 200) {
            throw new OAuthException($response);
        }

        $data = json_decode($response->getContent(), true);

        $this->storage->set($key, $response->getContent(), array_key_exists('expires_in', $data) ? $data['expires_in'] : 3600);

        return $data;
    }
}
