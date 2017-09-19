<?php

namespace MR\SDK\Endpoints;

class DiffusionEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/diffusions/'.$id);
    }

    public static function getBaseUri(): string
    {
        return 'diffusions';
    }
}
