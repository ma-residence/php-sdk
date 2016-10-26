<?php

namespace MR\SDK\Endpoints;

class TopicEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function get()
    {
        return $this->request->get('/topics');
    }
}
