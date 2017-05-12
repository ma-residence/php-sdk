<?php

namespace MR\SDK\Endpoints;

class LotEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @throws \Exception
     */
    public function all($page = 1, $perPage = 20, $extraParams = [])
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
    public function post(array $data = [])
    {
        return $this->request->post('/lots', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put($id, array $data = [])
    {
        return $this->request->put('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch($id, array $data = [])
    {
        return $this->request->patch('/lots/'.$id, [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete($id, array $data = [])
    {
        return $this->request->delete('/lots/'.$id, [], $data);
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
     * @param $id
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembers($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/lots/$id/members", array_merge([
            'page' => $page,
            'per_page' => $perPage,
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
        return $this->request->get("/lots/$id/activity", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function join(array $data = [])
    {
        return $this->request->post('/lots/join', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function joinWithoutRole(array $data = [])
    {
        return $this->request->post('/lots/join-without-role', [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function membersExternals($id)
    {
        return $this->request->get("/lots/{$id}/members/externals");
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
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
    public function membersLendObjects($id)
    {
        return $this->request->get("/lots/{$id}/members/lend-objects");
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
    public function postDirectory($id, array $data = [])
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
    public function putDirectory($id, $directoryId, array $data = [])
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
    public function patchDirectory($id, $directoryId, array $data = [])
    {
        return $this->request->patch('/lots/'.$id.'/directory/'.$directoryId, [], $data);
    }

    /**
     * @param string $id
     * @param string $directoryId
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function deleteDirectory($id, $directoryId, array $data = [])
    {
        return $this->request->delete('/lots/'.$id.'/directory/'.$directoryId, [], $data);
    }
}
