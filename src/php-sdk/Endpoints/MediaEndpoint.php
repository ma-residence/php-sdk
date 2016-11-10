<?php

namespace MR\SDK\Endpoints;

class MediaEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/medias/'.$id);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function post($data)
    {
        return $this->request->post('/medias', [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/medias/'.$id);
    }
}
