<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class ParticipateEndpoint extends Endpoint
{
    public function post(array $data = []): Response
    {
        return $this->request->post('/participates', [], $data);
    }

    public function put(array $data = []): Response
    {
        return $this->request->put('/participates', [], $data);
    }

    public function delete(array $data = []): Response
    {
        return $this->request->delete('/participates', [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'participates';
    }
}
