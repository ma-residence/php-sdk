<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Response;

trait MembersTrait
{
    use EndpointTrait;

    public function getMembers(string $id, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/members", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
