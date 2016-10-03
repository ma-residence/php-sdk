<?php

namespace MR\SDK\Endpoints;

class LotEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @throws \Exception
     */
    public function all($page = 1, $perPage = 20)
    {
        throw new \Exception('Not Implemented Yet');
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/lots/'.$id);
    }

    /**
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/lots', [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/lots/'.$id);
    }

    /**
     * @param string $id
     * @param string $key
     * @param string $value
     * @return \MR\SDK\Transport\Response
     */
    public function postSettings($id, $key, $value)
    {
        return $this->request->post("/lots/$id/settings", [], [
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
        return $this->request->put("/lots/$id/settings/$key", [], [
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
