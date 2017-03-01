<?php

namespace MR\SDK\Endpoints;

class ParticipateEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/participates', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put(array $data = [])
    {
        return $this->request->put('/participates', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete('/participates', [], $data);
    }
}
