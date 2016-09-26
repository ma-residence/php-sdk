<?php

namespace MR\SDK\Endpoints;

class DonationEndpoint extends Endpoint
{
    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/donations/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/donations', [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/donations/'.$id, [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/donations/'.$id, [], $data);
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/donations/'.$id);
    }
}
