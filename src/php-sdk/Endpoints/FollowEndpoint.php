<?php

namespace MR\SDK\Endpoints;

class FollowEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/follows', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete('/follows', [], $data);
    }
}
