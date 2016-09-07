<?php

namespace MR\SDK\Endpoints;

class CityHallEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * {@inheritdoc}
     */
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/city-halls', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->request->get('/city-halls/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $data)
    {
        return $this->request->post('/city-halls', [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function put($id, array $data)
    {
        return $this->request->put('/city-halls/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/city-halls/'.$id, [], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        return $this->request->delete('/city-halls/'.$id);
    }

    /**
     * {@inheritdoc}
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/city-halls/$id/settings", [], [
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function putSettings($id, $key, $value)
    {
        return $this->request->put("/city-halls/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSettings($id, $key)
    {
        return $this->request->delete("/city-halls/$id/settings/$key");
    }
}
