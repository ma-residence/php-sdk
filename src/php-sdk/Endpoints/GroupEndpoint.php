<?php

namespace MR\SDK\Endpoints;

class GroupEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $per_page = 20)
    {
        return $this->request->get('/groups', [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/groups/'.$id);
    }

    /**
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/groups', [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/groups/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/groups/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/groups/'.$id);
    }

    /**
     * @param string $id
     * @param string $key
     * @param string $value
     * @return \MR\SDK\Transport\Response
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/groups/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * @param string $id
     * @param string $key
     * @param string $value
     * @return \MR\SDK\Transport\Response
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/groups/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param string $id
     * @param string $key
     * @return \MR\SDK\Transport\Response
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/groups/$id/settings/$key");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id)
    {
        return $this->request->get("/groups/$id/members");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($id)
    {
        return $this->request->get("/groups/$id/followers");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id)
    {
        return $this->request->get("/groups/$id/recommendations");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id)
    {
        return $this->request->get("/groups/$id/activity");
    }
}
