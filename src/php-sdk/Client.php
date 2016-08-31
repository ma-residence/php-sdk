<?php

namespace MR\SDK;

use MR\SDK\Auth\OAuth;
use MR\SDK\Endpoints\Endpoint;
use MR\SDK\Endpoints\UserEndpoint;
use MR\SDK\Transport\Request;

class Client
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var OAuth
     */
    private $auth;

    /**
     * @var Endpoint[]
     */
    private $cachedEndpoints;

    public function __construct($host, $clientId, $clientSecret)
    {
        $this->auth = new OAuth($this, $clientId, $clientSecret);
        $this->request = new Request($this, $host);
        $this->cachedEndpoints = [];
    }

    /**
     * @return UserEndpoint
     */
    public function users()
    {
        return $this->getEndpoint('users', Endpoints\UserEndpoint::class);
    }

    /**
     * @param string $endpoint
     * @param string $class
     *
     * @return Endpoint
     */
    private function getEndpoint($endpoint, $class)
    {
        if (!isset($this->cachedEndpoints[$endpoint])) {
            $this->cachedEndpoints[$endpoint] = new $class($this->request);
        }

        return $this->cachedEndpoints[$endpoint];
    }

    /**
     * @return Request
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * @return OAuth
     */
    public function auth()
    {
        return $this->auth;
    }
}
