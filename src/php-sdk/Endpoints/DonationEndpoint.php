<?php

namespace MR\SDK\Endpoints;

class DonationEndpoint extends Endpoint implements ResourceEndpointInterface
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'donations';
    }
}
