<?php

namespace MR\SDK\Endpoints;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param int    $page
     * @param int    $per_page
     * @param array  $extra_params
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
     * @param array $placeId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMap(array $placeId)
    {
        return $this->request->get('/places/'.$placeId.'/map');
    }
}
