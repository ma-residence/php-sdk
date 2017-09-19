<?php

namespace MR\SDK\Endpoints;

class CivicActionEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'civic-actions';
    }
}
