<?php

namespace MR\SDK\Endpoints;

class AlertEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'alerts';
    }
}
