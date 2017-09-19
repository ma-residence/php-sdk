<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Endpoints\Traits\EndpointTrait;
use MR\SDK\Transport\Request;

abstract class Endpoint
{
    use EndpointTrait;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
