<?php

namespace MR\SDK\Endpoints;

class PollEndpoint extends Endpoint
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'polls';
    }
}
