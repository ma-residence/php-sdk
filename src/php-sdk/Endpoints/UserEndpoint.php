<?php

namespace MR\SDK\Endpoints;

class UserEndpoint extends Endpoint
{
    public function all($page = 1, $perPage = 20)
    {
        return $this->request->get('/users', [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    public function get($id)
    {
        return $this->request->get('/users/'.$id);
    }

    public function post($data)
    {
        return $this->request->post('/users', [], $data);
    }

    public function put($id, $data)
    {
        return $this->request->put('/users/'.$id, [], $data);
    }

    public function patch($id, $data)
    {
        return $this->request->patch('/users/'.$id, [], $data);
    }

    public function delete($id)
    {
        return $this->request->delete('/users/'.$id);
    }
}
