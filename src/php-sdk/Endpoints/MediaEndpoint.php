<?php

namespace MR\SDK\Endpoints;

class MediaEndpoint extends Endpoint
{
    use Traits\ResourceTrait;

    public static function getBaseUri(): string
    {
        return 'medias';
    }
}
