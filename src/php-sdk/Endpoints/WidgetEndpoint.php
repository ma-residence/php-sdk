<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class WidgetEndpoint extends Endpoint
{
    public function all(int $page = 1, int $perPage = 20, array $zipCodes = [], array $extraParams = []): Response
    {
        return $this->request->get('/widgets/activity', array_merge([
            'page' => $page,
            'per_page' => $perPage,
            'zipCodes' => $zipCodes,
        ], $extraParams));
    }

    public function allFromPlace(int $page = 1, int $perPage = 20, $place, array $extraParams = []): Response
    {
        return $this->request->get('/widgets/activity/'.$place, array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'widgets';
    }
}
