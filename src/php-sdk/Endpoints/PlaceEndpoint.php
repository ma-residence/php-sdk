<?php

namespace MR\SDK\Endpoints;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param int $page
     * @param int $per_page
     * @param $placeId
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($page = 1, $per_page = 20,  $placeId)
    {
        return $this->request->get('/places/'.$placeId.'/activity', [
            'page' => $page,
            'per_page' => $per_page,
        ]);
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
