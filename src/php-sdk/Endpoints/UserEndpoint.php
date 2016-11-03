<?php

namespace MR\SDK\Endpoints;

class UserEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $per_page = 20)
    {
        return $this->request->get('/users', [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/users/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/users', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/users/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/users/'.$id, [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/users/'.$id);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getSettings($id)
    {
        return $this->request->get('/users/'.$id.'/settings');
    }

    /**
     * @param string $id
     * @param string $key
     * @param string $value
     *
     * @return \MR\SDK\Transport\Response
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/users/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param string $id
     * @param string $type
     * @param string $targetId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMemberOf($id, $type, $targetId)
    {
        return $this->request->get("/users/$id/member-of/$type/$targetId");
    }
}
