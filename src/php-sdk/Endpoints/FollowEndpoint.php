<?php

namespace MR\SDK\Endpoints;

class FollowEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post("/{$this::getBaseUri()}", [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete("/{$this::getBaseUri()}", [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'follows';
    }
}
