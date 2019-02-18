<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class MitrustEndpoint extends Endpoint
{
    public static function getBaseUri(): string
    {
        return 'mitrusts';
    }

    /**
     * @param string $id
     *
     * @return Response
     */
    public function get(string $id): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id");
    }
}
