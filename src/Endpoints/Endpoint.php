<?php

namespace MR\Endpoints;

use MR\Transport\Request;

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
