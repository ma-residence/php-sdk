<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class NewsletterEndpoint extends Endpoint
{
    public function getNewsletterRecipients(string $type, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get('/newsletters/recipients', array_merge([
            'newsletter' => $type,
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getNewsletterBuildingRecipients(string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/building/$frequency/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getNewsletterNeighbourhoodRecipients(int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get('/newsletters/neighbourhood/recipients', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getPublicationsNeighbourhoodActivity(string $postalCode, string $locality, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get('/newsletters/neighbourhood_activity/publications', array_merge([
            'postal_code' => $postalCode,
            'locality' => $locality,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getPublicationsLotActivity(string $lotId, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/lot_activity/publications/$lotId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getNeighboursNeighbourhoodActivity(string $postalCode, string $locality, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get('/newsletters/neighbourhood_activity/neighbours', array_merge([
            'postal_code' => $postalCode,
            'locality' => $locality,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getNeighboursLotActivity(string $lotId, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/lot_activity/neighbours/$lotId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getLendObjectsLotActivity(string $lotId, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/lot_activity/lend_objects/$lotId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getFavoriteTopicsActivity(string $postalCode, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/topics_activity/$postalCode", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getFavoritesActivity(string $userId, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/favorites_activity/$userId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getPublicationsGroupActivity(string $groupId, string $frequency, int $page = 1, int $perPage = 100, array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/community_activity/publications/$groupId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getLocalityCounters(array $extraParams = []) : Response
    {
        return $this->request->get("/newsletters/locality/counters", array_merge([], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'newsletters';
    }
}
