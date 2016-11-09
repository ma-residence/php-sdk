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
     * @param mixed $resource
     *
     * @return mixed
     */
    public function post($resource)
    {
        return $this->request->post('/medias', [], [], [
            'contentLength' => $resource->getClientSize(),
            'contentType' => $resource->getClientMimeType(),
            'body' => file_get_contents($resource)
        ]);
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
