<?php

namespace MR\SDK\Endpoints;

class UserEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/users', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->request->get('/users/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $data)
    {
        return $this->request->post('/users', [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function put($id, array $data)
    {
        return $this->request->put('/users/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/users/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        return $this->request->delete('/users/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/users/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/users/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/users/$id/settings/$key");
    }

    /**
     * {@inheritdoc}
     */
    public function postEmails($id, $key, $value)
    {
        return $this->request->post("/users/$id/emails", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putEmails($id, $key, $value)
    {
        return $this->request->put("/users/$id/emails/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteEmails($id, $key)
    {
        return $this->request->delete("/users/$id/emails/$key");
    }
}
