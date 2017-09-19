<?php

namespace MR\SDK\Endpoints;

class MemberOfEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/members', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put(array $data = [])
    {
        return $this->request->put('/members', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete('/members', [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'members';
    }
}
