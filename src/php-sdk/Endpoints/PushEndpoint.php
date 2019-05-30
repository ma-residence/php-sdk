<?php

namespace MR\SDK\Endpoints;

class PushEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'pushs';
    }
}
