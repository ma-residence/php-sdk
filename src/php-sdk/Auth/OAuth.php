<?php

namespace MR\SDK\Auth;

use MR\SDK\Client;

class OAuth
{
    const TOKEN_ENDPOINT = "/oauth/v2/token";

    const GRANT_REFRESH  = 'refresh';
    const GRANT_PASSWORD = 'password';
    const GRANT_EXTERNAL = 'urn:external';

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
     * @param string   $clientId
     * @param string   $clientSecret
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
     *
     * @return string
     */
    public function loginWithCredentials($email, $password)
    {
        $this->requestAccessToken(self::GRANT_PASSWORD, [
            'username' => $email,
            'password' => $password,
        ]);

        return $this->accessToken;
    }

    /**
     * @param string $type
     * @param string $token
     *
     * @return string
     */
    public function loginWithExternalToken($type, $token)
    {
        $this->requestAccessToken(self::GRANT_EXTERNAL, [
            'type' => $type,
            'token' => $token,
        ]);

        return $this->accessToken;
    }

    public function logout()
    {
        $this->accessToken =
        $this->accessTokenLifetime =
        $this->refreshToken = null;
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
            $this->requestAccessToken(self::GRANT_REFRESH, [
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
     * @throws \OAuthException
     */
    private function requestAccessToken($grant, array $options = [])
    {
        $response = $this->client->request()->get(self::TOKEN_ENDPOINT, array_merge([
            'grant_type' => $grant,
        ], $options));

        $json = \GuzzleHttp\json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() !== 200) {
            throw new \OAuthException($json->error_description);
        }

        $now = new \DateTime();

        $this->accessToken = $json->access_token;
        $this->refreshToken = $json->refresh_token;
        $this->accessTokenLifetime = $now->modify("+ {$json->expires_in} seconds");
    }
}
