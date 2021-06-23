<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param int   $id
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/'.$id, array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/activity', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getEvents($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/events', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getCivicActions($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/civic-actions', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string   $placeId
     * @param int|null $radius
     * @param int      $page
     * @param int      $perPage
     * @param array    $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMap($placeId, $radius = null, $page = 1, $perPage = 20, $extraParams = [])
    {
        if ($radius) {
            $extraParams['radius'] = $radius;
        }

        return $this->request->get('/places/'.$placeId.'/map', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($parameters)
    {
        return $this->request->get('/places/members', $parameters);
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getCustomers($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/customers', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $query
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function search($query, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/search', array_merge([
            'query' => $query,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $placeId
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getTown($placeId, $extraParams = [])
    {
        return $this->request->get('/places/'.$placeId.'/town', $extraParams);
    }

    /**
     * @param string $longitude
     * @param string $latitude
     * @param string $placeType
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNeighbourhoodPublications(string $longitude, string $latitude, string $placeType, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/lng/'.$longitude.'/lat/'.$latitude.'/publications', array_merge([
            'place_type' => $placeType,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $longitude
     * @param string $latitude
     * @param string $placeType
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getNeighbourhoodCounters(string $longitude, string $latitude, string $placeType, $extraParams = [])
    {
        return $this->request->get('/places/lng/'.$longitude.'/lat/'.$latitude.'/counters', array_merge([
            'place_type' => $placeType,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getServices($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/services', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getUsersByPlaceId(string $placeId, array $parameters): Response
    {
        return $this->request->get('/places/'.$placeId.'/users',$parameters);
    }

    public static function getBaseUri(): string
    {
        return 'place';
    }
}
