<?php

namespace MR\SDK\Endpoints;

class AssociationEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/associations', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->request->get('/associations/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $data)
    {
        return $this->request->post('/associations', [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function put($id, array $data)
    {
        return $this->request->put('/associations/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/associations/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        return $this->request->delete('/associations/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/associations/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/associations/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/associations/$id/settings/$key");
    }
}
