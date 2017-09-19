<?php

namespace MR\SDK\Endpoints;

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
     * @param null|int $radius
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
    public function getMembers($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/members', array_merge([
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
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getTown($placeId, $extraParams = [])
    {
        return $this->request->get('/places/'.$placeId.'/town', $extraParams);
    }

    /**
      * @param  string  $locality
      * @param  string  $postalCode
      * @param  integer $page
      * @param  integer $perPage
      * @param  array   $extraParams
      *
      * @return \MR\SDK\Transport\Response
      */
    public function getTownPublications($locality, $postalCode, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/places/town/publications', array_merge([
            'locality' => $locality,
            'postalCode' => $postalCode,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'place';
    }
}
