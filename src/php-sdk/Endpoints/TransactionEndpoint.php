<?php

namespace MR\SDK\Endpoints;

class TransactionEndpoint extends Endpoint
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'transactions';
    }
}
