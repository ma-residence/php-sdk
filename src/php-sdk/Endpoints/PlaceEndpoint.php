<?php

namespace MR\SDK\Endpoints;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param int    $page
     * @param int    $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($page = 1, $per_page = 20)
    {
        return $this->request->get('/places/activity', [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param string $placeId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMap(array $placeId)
    {
        return $this->request->get('/places/'.$placeId.'/map');
    }
}
