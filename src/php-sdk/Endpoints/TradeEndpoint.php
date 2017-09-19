<?php

namespace MR\SDK\Endpoints;

class TradeEndpoint extends Endpoint
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'trades';
    }
}
