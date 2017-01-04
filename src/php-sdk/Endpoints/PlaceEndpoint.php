<?php

namespace MR\SDK\Endpoints;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param int   $page
     * @param int   $per_page
     * @param array $extra_params
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($page = 1, $per_page = 20, $extra_params = [])
    {
        return $this->request->get('/places/activity', array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }

    /**
     * @param int   $page
     * @param int   $per_page
     * @param array $extra_params
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getEvents($page = 1, $per_page = 20, $extra_params = [])
    {
        return $this->request->get('/places/events', array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }

    /**
     * @param string $placeId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMap($placeId, $radius = null, $page = 1, $per_page = 20)
    {
        $params = $radius ? ['radius' => $radius] : [];

        return $this->request->get('/places/'.$placeId.'/map', array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $params));
    }

    /**
     * @param int   $page
     * @param int   $per_page
     * @param array $extra_params
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($page = 1, $per_page = 20, $extra_params = [])
    {
        return $this->request->get('/places/members', array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }
}
