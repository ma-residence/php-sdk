<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Request;

abstract class Endpoint
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
