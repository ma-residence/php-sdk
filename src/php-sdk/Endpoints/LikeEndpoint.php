<?php

namespace MR\SDK\Endpoints;

class LikeEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/likes', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete('/likes', [], $data);
    }
}
