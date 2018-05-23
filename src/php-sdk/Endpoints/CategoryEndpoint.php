<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class CategoryEndpoint extends Endpoint
{
    use Traits\MembersTrait;

    const TYPE_INTEREST = 'interest';
    const TYPE_SERVICE = 'service';
    const TYPE_GOOD = 'good';
    const TYPE_BADGE = 'badge';
    const TYPE_ASSOCIATION = 'association';

    public function all(string $type = null, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}", array_merge([
            'type' => $type,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function get(string $id): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id");
    }

    public static function getBaseUri(): string
    {
        return 'categories';
    }
}
