<?php

namespace MR\SDK\Endpoints;

class GroupEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\SettingsTrait;
    use Traits\MembersTrait;
    use Traits\FollowersTrait;
    use Traits\RecommendationsTrait;
    use Traits\ActivityTrait;

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembersCustomers($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/groups/$id/members/customers", array_merge([
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
        return $this->request->post('/groups/join', [], $data);
    }

    /**
     * @param string $id
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getDirectory($id)
    {
        return $this->request->get('/groups/' . $id . '/directory');
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function postDirectory($id, array $data = [])
    {
        return $this->request->post('/groups/' . $id . '/directory', [], $data);
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
        return $this->request->put('/groups/' . $id . '/directory/' . $directoryId, [], $data);
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
        return $this->request->patch('/groups/' . $id . '/directory/' . $directoryId, [], $data);
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
        return $this->request->delete('/groups/' . $id . '/directory/' . $directoryId, [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'groups';
    }
}
