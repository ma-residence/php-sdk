<?php

namespace MR\SDK\Endpoints;

class MediaEndpoint extends Endpoint
{
    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/medias/'.$id);
    }

    /**
     * @param $resource
     *
     * @return mixed
     */
    public function post($resource)
    {
        if (false === is_resource($resource)) {
            throw new \InvalidArgumentException('Expecting a resource');
        }

        return $this->post('/medias', [], [], ['body' => $resource]);
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/medias/'.$id);
    }
}
