<?php

namespace MR\SDK;

use MR\SDK\Auth\OAuth;
use MR\SDK\Endpoints\Endpoint;
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

    /*
     * @todo: Add endpoints
     *
     * public function foo()
     * {
     *    if (isset($this->$cachedEndpoints[__METHOD__])) {
     *        $this->$cachedEndpoints[__METHOD__] = new Endpoints\Foo($this->request);
     *    }
     *
     *    return $this->$cachedEndpoints[__METHOD__];
     * }
     */

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
