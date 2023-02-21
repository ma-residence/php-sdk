<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Endpoints\Traits\ListTrait;
use MR\SDK\Transport\Response;

class FeatureEndpoint extends Endpoint
{
    use Traits\ResourceTrait;
    use ListTrait;

    public function getRecipients(string $feature, int $page = 1, int $perPage = 20, array $extraParams = []) : Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$feature/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'features';
    }
}
