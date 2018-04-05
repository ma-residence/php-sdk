<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class NotificationEndpoint extends Endpoint
{
    public function getRecipients(array $ids = []): Response
    {
        return $this->request->get('/notifications/recipients', [
            'ids' => $ids,
        ]);
    }

    public function getOpenTomorrow(int $page = 1, int $perPage = 100, array $extraParams = []): Response
    {
        return $this->request->get('/notifications/markets/open-tomorrow', array_merge([
             'page' => $page,
             'per_page' => $perPage,
        ], $extraParams));
    }

    public function getRecipientsFromMedia(string $mediaId, int $page = 1, int $perPage = 100, array $extraParams = []): Response
    {
        return $this->request->get("/notifications/media/$mediaId/recipients", array_merge([
             'page' => $page,
             'per_page' => $perPage,
        ], $extraParams));
    }

    public function getTopicsRecipients(array $topics, string $placeId, int $page = 1, int $perPage = 100, array $extraParams = []): Response
    {
        return $this->request->get("/notifications/topics/recipients", array_merge([
             'topics' => $topics,
             'place_id' => $placeId,
             'page' => $page,
             'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'notifications';
    }
}
