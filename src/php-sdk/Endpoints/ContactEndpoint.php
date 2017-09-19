<?php

namespace MR\SDK\Endpoints;

class ContactEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'contacts';
    }
}
