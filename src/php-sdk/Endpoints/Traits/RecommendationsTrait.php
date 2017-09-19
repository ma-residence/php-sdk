<?php

namespace MR\SDK\Endpoints\Traits;

use MR\SDK\Transport\Response;

trait RecommendationsTrait
{
    use EndpointTrait;

    public function getRecommendations(string $id, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/recommendations", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
