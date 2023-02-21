<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class PublicationEndpoint extends Endpoint
{
    public function get(string $id): Response
    {
        return $this->request->get('/publications/'.$id);
    }

    public static function getBaseUri(): string
    {
        return 'publications';
    }
}
