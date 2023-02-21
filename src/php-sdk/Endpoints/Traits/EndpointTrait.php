<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Request;

trait EndpointTrait
{
    protected Request $request;

    abstract public static function getBaseUri(): string;
}
