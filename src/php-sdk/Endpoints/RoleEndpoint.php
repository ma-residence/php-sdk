<?php

namespace MR\SDK\Endpoints;

class RoleEndpoint extends Endpoint
{
    /**
     * @param string $type
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($type = null)
    {
        $params = $type ? ['type' => $type] : [];

        return $this->request->get('/roles', $params);
    }
}
