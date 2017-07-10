<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class NewsletterEndpoint extends Endpoint
{
    /**
     * @param string $type
     * @param string $frequency
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return Response
     */
    public function getNewsletterRecipients($type, $frequency, $page = 1, $perPage = 100, array $extraParams = [])
    {
        return $this->request->get('/newsletters/recipients', array_merge([
            'newsletter' => $type,
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $frequency
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return Response
     */
    public function getNewsletterBuildingRecipients($frequency, $page = 1, $perPage = 100, array $extraParams = [])
    {
        return $this->request->get("/newsletters/building/$frequency/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $frequency
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return Response
     */
    public function getNewsletterNeighbourhoodRecipients($frequency, $page = 1, $perPage = 100, array $extraParams = [])
    {
        return $this->request->get("/newsletters/neighbourhood/$frequency/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $postalCode
     * @param string $locality
     * @param string $frequency
     * @param string $receiverId
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getPublicationsNeighbourhoodActivity($postalCode, $locality, $frequency, $receiverId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get('/newsletters/neighbourhood_activity/publications', array_merge([
            'postal_code' => $postalCode,
            'locality' => $locality,
            'frequency' => $frequency,
            'receiver_id' => $receiverId,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $lot
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getPublicationsLotActivity($lot, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/lot_activity/publications/$lot", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $postalCode
     * @param string $locality
     * @param string $frequency
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNeighboursNeighbourhoodActivity($postalCode, $locality, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get('/newsletters/neighbourhood_activity/neighbours', array_merge([
            'postal_code' => $postalCode,
            'locality' => $locality,
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $lot
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNeighboursLotActivity($lot, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/lot_activity/neighbours/$lot", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $lot
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getLendObjectsLotActivity($lot, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/lot_activity/lend_objects/$lot", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $zipCode
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFavoriteTopicsActivity($zipCode, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/topics_activity/$zipCode", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $userId
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFavoritesActivity($userId, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/favorites_activity/$userId", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $group
     * @param $frequency
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getPublicationsGroupActivity($group, $frequency, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/newsletters/community_activity/publications/$group", array_merge([
            'frequency' => $frequency,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
