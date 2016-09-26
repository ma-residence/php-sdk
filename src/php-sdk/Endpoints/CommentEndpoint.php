<?php

namespace MR\SDK\Endpoints;

class CommentEndpoint extends Endpoint
{
    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/comments/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/comments', [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/comments/'.$id, [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/comments/'.$id, [], $data);
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/comments/'.$id);
    }
}