<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Request;

trait EndpointTrait
{
    /**
     * @var Request
     */
    protected $request;

    abstract public static function getBaseUri(): string;
}
