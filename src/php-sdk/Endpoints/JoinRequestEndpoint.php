<?php

namespace MR\SDK\Endpoints;

class JoinRequestEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/join-requests', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function accept(array $data)
    {
        return $this->request->put('/join-requests/accept', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function decline(array $data)
    {
        return $this->request->put('/join-requests/decline', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data)
    {
        return $this->request->delete('/join-requests', [], $data);
    }
}
