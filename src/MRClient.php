<?php

namespace MR;

use MR\Auth\MROAuth;
use MR\Endpoints\Endpoint;
use MR\Transport\Request;

class MRClient
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var MROAuth
     */
    private $auth;

    /**
     * @var Endpoint[]
     */
    private $cachedEndpoints;

    public function __construct($host, $clientId, $clientSecret)
    {
        $this->auth = new MROAuth($this, $clientId, $clientSecret);
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
     * @return MROAuth
     */
    public function auth()
    {
        return $this->auth;
    }
}
