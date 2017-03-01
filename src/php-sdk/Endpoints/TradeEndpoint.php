<?php

namespace MR\SDK\Endpoints;

class TradeEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/trades/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/trades', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data = [])
    {
        return $this->request->put('/trades/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data = [])
    {
        return $this->request->patch('/trades/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete('/trades/'.$id, [], $data);
    }
}
