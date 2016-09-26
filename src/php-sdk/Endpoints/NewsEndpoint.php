<?php

namespace MR\SDK\Endpoints;

class NewsEndpoint extends Endpoint
{
    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/news/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/news', [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/news/'.$id, [], $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/news/'.$id, [], $data);
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/news/'.$id);
    }
}
