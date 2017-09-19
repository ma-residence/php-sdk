<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Request;

trait EndpointTrait
{
    /**
     * @var Request
     */
    protected $request;

    public abstract static function getBaseUri(): string;
}
