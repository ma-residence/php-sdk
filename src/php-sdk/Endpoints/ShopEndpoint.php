<?php

namespace MR\SDK\Endpoints;

class ShopEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/shops', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/shops/'.$id);
    }

    /**
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/shops', [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/shops/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/shops/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/shops/'.$id);
    }

    /**
     * @param string $id
     * @param string $key
     * @param string $value
     * @return \MR\SDK\Transport\Response
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/shops/$id/settings", [], [
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
        return $this->request->put("/shops/$id/settings/$key", [], [
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
        return $this->request->delete("/shops/$id/settings/$key");
    }

    /**
     * @param $id
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id)
    {
        return $this->request->get("/shops/$id/members");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($id)
    {
        return $this->request->get("/shops/$id/followers");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id)
    {
        return $this->request->get("/shops/$id/recommendations");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id)
    {
        return $this->request->get("/shops/$id/activity");
    }
}
