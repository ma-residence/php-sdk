<?php

namespace MR\SDK\Endpoints;

class LotEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int $page
     * @param int $per_page
     *
     * @throws \Exception
     */
    public function all($page = 1, $per_page = 20)
    {
        throw new \Exception('Not Implemented Yet');
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function get($id)
    {
        return $this->request->get('/lots/'.$id);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function post(array $data)
    {
        return $this->request->post('/lots', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data)
    {
        return $this->request->put('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data)
    {
        return $this->request->patch('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id)
    {
        return $this->request->delete('/lots/'.$id);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getSettings($id)
    {
        return $this->request->get('/lots/'.$id.'/settings');
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
        return $this->request->put("/lots/$id/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param string $id
     * @param int    $page
     * @param int    $per_page
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id, $page, $per_page)
    {
        return $this->request->get("/lots/$id/members", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
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
        return $this->request->get("/lots/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $per_page,
        ], $extra_params));
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function join(array $data)
    {
        return $this->request->post('/lots/join', [], $data);
    }

    /**
     * @param  strin $id
     *
     * @return MR\SDK\Transport\Response
     */
    public function membersCategories($id)
    {
        return $this->request->get("/lots/{$id}/members/categories");
    }
  
    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getDirectory($id)
    {
        return $this->request->get('/lots/'.$id.'/directory');
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function postDirectory($id, array $data)
    {
        return $this->request->post('/lots/'.$id.'/directory', [], $data);
    }

    /**
     * @param string $id
     * @param string $directoryId
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function putDirectory($id, $directoryId, array $data)
    {
        return $this->request->put('/lots/'.$id.'/directory/'.$directoryId, [], $data);
    }

    /**
     * @param string $id
     * @param string $directoryId
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patchDirectory($id, $directoryId, array $data)
    {
        return $this->request->patch('/lots/'.$id.'/directory/'.$directoryId, [], $data);
    }

    /**
     * @param string $id
     * @param string $directoryId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function deleteDirectory($id, $directoryId)
    {
        return $this->request->delete('/lots/'.$id.'/directory/'.$directoryId);
    }
}
