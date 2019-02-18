<?php

namespace MR\SDK\Endpoints;

class MitrustEndpoint extends Endpoint implements ResourceEndpointInterface
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
