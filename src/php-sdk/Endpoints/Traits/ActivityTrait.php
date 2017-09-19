<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Response;

trait ActivityTrait
{
    use EndpointTrait;

    public function getActivity(string $id, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
