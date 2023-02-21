<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class InvitationEndpoint extends Endpoint
{
    public function get(string $id): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id");
    }

    public function post(array $data): Response
    {
        return $this->request->post("/{$this::getBaseUri()}", [], $data);
    }

    public function delete(string $id, array $data = []): Response
    {
        return $this->request->delete("/{$this::getBaseUri()}/$id", [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'invitations';
    }
}
