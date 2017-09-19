<?php

namespace MR\SDK\Endpoints;

class ProfileEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/profiles/'.$id);
    }

    public static function getBaseUri(): string
    {
        return 'profiles';
    }
}
