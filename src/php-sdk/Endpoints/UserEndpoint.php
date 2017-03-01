<?php

namespace MR\SDK\Endpoints;

class UserEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/users', array_merge([
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
        return $this->request->get('/users/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data = [])
    {
        return $this->request->post('/users', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data = [])
    {
        return $this->request->put('/users/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data = [])
    {
        return $this->request->patch('/users/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete('/users/'.$id, [], $data);
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
     * @param  string $id
     * @return MR\SDK\Transport\Response
     */
    public function getLots($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/member-of/lot", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param  string $id
     * @return MR\SDK\Transport\Response
     */
    public function getGroups($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/member-of/group", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param $type
     * @param $targetId
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getMemberOf($id, $type, $targetId, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/member-of/$type/$targetId", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param null $type
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id, $type = null, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/recommendations", array_merge([
            'page' => $page,
            'per_page' => $perPage,
            'type' => $type,
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
        return $this->request->get("/users/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param $type
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowsByType($id, $type, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/follows/$type", array_merge([
            'page' => $page,
            'per_page' => $perPage
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getFollows($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/follows", array_merge([
            'page' => $page,
            'per_page' => $perPage
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
        return $this->request->get("/users/$id/followers", array_merge([
            'page' => $page,
            'per_page' => $perPage
        ], $extraParams));
    }

    /**
     * @param $id
     * @param $type
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getJoinRequestList($id, $type, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/join-request/$type", array_merge([
            'page' => $page,
            'per_page' => $perPage
        ], $extraParams));
    }

    /**
     * @param $id
     * @param $type
     * @param $targetId
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getJoinRequest($id, $type, $targetId, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/join-request/$type/$targetId", array_merge([
            'page' => $page,
            'per_page' => $perPage
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int $page
     * @param int $perPage
     * @param array $extraParams
     * @return \MR\SDK\Transport\Response
     */
    public function getDevices($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/devices", array_merge([
            'page' => $page,
            'per_page' => $perPage
        ], $extraParams));
    }
}
