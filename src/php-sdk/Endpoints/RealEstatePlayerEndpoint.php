<?php

namespace MR\SDK\Endpoints;

class RealEstatePlayerEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/real-estate-players', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->request->get('/real-estate-players/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $data)
    {
        return $this->request->post('/real-estate-players', [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function put($id, array $data)
    {
        return $this->request->put('/real-estate-players/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/real-estate-players/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        return $this->request->delete('/real-estate-players/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/real-estate-players/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/real-estate-players/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/real-estate-players/$id/settings/$key");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id)
    {
        return $this->request->get("/real-estate-players/$id/members");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($id)
    {
        return $this->request->get("/real-estate-players/$id/followers");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($id)
    {
        return $this->request->get("/real-estate-players/$id/recommendations");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id)
    {
        return $this->request->get("/real-estate-players/$id/activity");
    }
}
