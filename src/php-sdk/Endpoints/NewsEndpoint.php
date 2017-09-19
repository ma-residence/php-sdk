<?php

namespace MR\SDK\Endpoints;

class NewsEndpoint extends Endpoint
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'news';
    }
}
