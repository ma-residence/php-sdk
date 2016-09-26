<?php

namespace MR\SDK\Endpoints;

class LotEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function all($page = 1, $perPage = 20)
    {
        throw new \Exception('Not Implemented Yet');
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->request->get('/lots/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $data)
    {
        return $this->request->post('/lots', [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function put($id, array $data)
    {
        return $this->request->put('/lots/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/lots/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        return $this->request->delete('/lots/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/lots/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/lots/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/lots/$id/settings/$key");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id)
    {
        return $this->request->get("/lots/$id/members");
    }

    /**
     * @param $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($id)
    {
        return $this->request->get("/lots/$id/activity");
    }
}
