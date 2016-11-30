<?php

namespace MR\SDK\Endpoints;

class LendObjectEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function all()
    {
        return $this->request->get('/lend-objects', []);
    }
}
