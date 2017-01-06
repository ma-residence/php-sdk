<?php

namespace MR\SDK\Endpoints;

class InvitationEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function post($data)
    {
        return $this->request->post('/invitations', [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/invitations/'.$id);
    }
}
