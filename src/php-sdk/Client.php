<?php

namespace MR\SDK;

use MR\SDK\Auth\OAuth;
use MR\SDK\Endpoints;
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
     * @var Endpoints\Endpoint[]
     */
    private $cachedEndpoints;

    public function __construct($host, $clientId, $clientSecret)
    {
        $this->auth = new OAuth($this, $clientId, $clientSecret);
        $this->request = new Request($this, $host);
        $this->cachedEndpoints = [];
    }

    /**
     * @return Endpoints\MeEndpoint
     */
    public function me()
    {
        return $this->getEndpoint('me', Endpoints\MeEndpoint::class);
    }

    /**
     * @return Endpoints\UserEndpoint
     */
    public function users()
    {
        return $this->getEndpoint('users', Endpoints\UserEndpoint::class);
    }

    /**
     * @return Endpoints\ForgotPasswordEndPoint
     */
    public function forgetPassword()
    {
        return $this->getEndpoint('forget_password', Endpoints\ForgotPasswordEndPoint::class);
    }

    /**
     * @return Endpoints\GroupEndpoint
     */
    public function groups()
    {
        return $this->getEndpoint('groups', Endpoints\GroupEndpoint::class);
    }

    /**
     * @return Endpoints\AssociationEndpoint
     */
    public function associations()
    {
        return $this->getEndpoint('associations', Endpoints\AssociationEndpoint::class);
    }

    /**
     * @return Endpoints\CityHallEndpoint
     */
    public function cityHalls()
    {
        return $this->getEndpoint('city_halls', Endpoints\CityHallEndpoint::class);
    }

    /**
     * @return Endpoints\CategoryEndpoint
     */
    public function categories()
    {
        return $this->getEndpoint('categories', Endpoints\CategoryEndpoint::class);
    }

    /**
     * @return Endpoints\RoleEndpoint
     */
    public function roles()
    {
        return $this->getEndpoint('roles', Endpoints\RoleEndpoint::class);
    }

    /**
     * @return Endpoints\MeEndpoint
     */
    public function members()
    {
        return $this->getEndpoint('members', Endpoints\MemberOfEndpoint::class);
    }

    /**
     * @param string $endpoint
     * @param string $class
     *
     * @return Endpoints\Endpoint
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
