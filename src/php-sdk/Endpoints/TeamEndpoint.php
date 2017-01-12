<?php

namespace MR\SDK\Endpoints;

class TeamEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getTech()
    {
        return $this->request->get('/teams/tech');
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getSupport()
    {
        return $this->request->get('/teams/support');
    }
}
