<?php

namespace MR\SDK\Endpoints;

class RealEstatePlayerEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function all($page = 1, $per_page = 20)
    {
        return $this->request->get('/real-estate-players', [
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
        return $this->request->get('/real-estate-players/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/real-estate-players', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/real-estate-players/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/real-estate-players/'.$id, [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/real-estate-players/'.$id);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getSettings($id)
    {
        return $this->request->get('/real-estate-players/'.$id.'/settings');
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
        return $this->request->put("/real-estate-players/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id)
    {
        return $this->request->get("/real-estate-players/$id/members");
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($id)
    {
        return $this->request->get("/real-estate-players/$id/followers");
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id)
    {
        return $this->request->get("/real-estate-players/$id/recommendations");
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $per_page
     * @param array  $extra_params
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id, $page = 1, $per_page = 20, $extra_params = [])
    {
        return $this->request->get("/real-estate-players/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }
}
