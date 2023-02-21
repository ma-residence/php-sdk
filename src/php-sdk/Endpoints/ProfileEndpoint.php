<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class ProfileEndpoint extends Endpoint
{
    public function get(string $id): Response
    {
        return $this->request->get('/profiles/'.$id);
    }

    public static function getBaseUri(): string
    {
        return 'profiles';
    }
}
