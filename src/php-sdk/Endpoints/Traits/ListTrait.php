<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Response;

trait ListTrait
{
    use EndpointTrait;

    public function all(int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
