<?php

namespace MR\SDK\Endpoints;

class DemandEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'demands';
    }
}
