<?php

namespace MR\SDK\Endpoints;

class ProfileEndpoint extends Endpoint
{
    /**
     * @param string $slug
     * @return \MR\SDK\Transport\Response
     */
    public function get($slug)
    {
        return $this->request->get('/publications/'.$slug);
    }
}
