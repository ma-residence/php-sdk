<?php

namespace MR\SDK\Endpoints;

class PlaceEndpoint extends Endpoint
{
    /**
     * @param $placeId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($placeId)
    {
        return $this->request->get('/places/'.$placeId.'/activity');
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
