<?php

namespace MR\SDK\Endpoints;

class RoleEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function all()
    {
        return $this->request->get('/roles');
    }
}
