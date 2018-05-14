<?php

namespace MR\SDK\Endpoints;

class LotEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\SettingsTrait;
    use Traits\ActivityTrait;
    use Traits\MembersTrait;

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

    /**
     * Get all services of the neighbors.
     *
     * @param string $lotId
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getAllServices(string $lotId, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/lots/$lotId/services", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'lots';
    }
}
