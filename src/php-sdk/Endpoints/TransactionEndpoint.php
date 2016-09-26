<?php

namespace MR\SDK\Endpoints;

class TransactionEndpoint extends Endpoint
{
    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/transactions/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/transactions', [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/transactions/'.$id, [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/transactions/'.$id, [], $data);
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/transactions/'.$id);
    }
}
