<?php

namespace MR\SDK\Endpoints;

class EventEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'events';
    }
}
