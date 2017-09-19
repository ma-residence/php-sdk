<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Endpoints\Traits\ResourceTrait;

class ServiceEndpoint extends Endpoint
{
    use ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'services';
    }
}
