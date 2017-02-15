<?php

namespace MR\SDK\Endpoints;

class ShopEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/shops', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/shops/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/shops', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/shops/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/shops/'.$id, [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/shops/'.$id);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getSettings($id)
    {
        return $this->request->get('/shops/'.$id.'/settings');
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
        return $this->request->put("/shops/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param $id
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/shops/$id/members", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/shops/$id/followers", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/shops/$id/recommendations", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/shops/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
