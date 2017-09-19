<?php

namespace MR\SDK\Endpoints;

class InvitationEndpoint extends Endpoint
{
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get("/{$this::getBaseUri()}/$id");
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function post($data)
    {
        return $this->request->post("/{$this::getBaseUri()}", [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete("/{$this::getBaseUri()}/$id", [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'invitations';
    }
}
