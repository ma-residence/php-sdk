<?php

namespace MR\SDK\Auth;

use MR\SDK\Client;
use MR\SDK\Exceptions\OAuthException;

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
     * @param Client $client
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(Client $client, $clientId, $clientSecret)
    {
        $this->client = $client;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @param string $email
     * @param string $password
     */
    public function loginWithCredentials($email, $password)
    {
        return $this->requestAccessToken(self::GRANT_PASSWORD, [
            'username' => $email,
            'password' => $password,
        ]);
    }

    /**
     * @param string $type
     * @param string $token
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
        $response = $this->client->request()->get(self::TOKEN_ENDPOINT, array_merge([
            'grant_type' => $grant,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ], $options));

        if ($response->getStatusCode() !== 200) {
            throw new OAuthException($response);
        }

        $now = new \DateTime();

        $data = json_decode($response->getContent(), true);

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
}
