<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

class UserEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\SettingsTrait;
    use Traits\RecommendationsTrait;
    use Traits\ActivityTrait;
    use Traits\FollowersTrait;

    public function listMemberOf(string $id, string $type, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/member-of/$type", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public function getLots(string $id, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->listMemberOf($id, 'lot', $page, $perPage, $extraParams);
    }

    public function getGroups(string $id, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->listMemberOf($id, 'group', $page, $perPage, $extraParams);
    }

    public function getMemberOf(string $id, string $type, string $targetId, int $page = 1, int $perPage = 20, array $extraParams = []): Response
    {
        return $this->request->get("/{$this::getBaseUri()}/$id/member-of/$type/$targetId", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param $type
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowsByType($id, $type, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/follows/$type", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollows($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/follows", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $id
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getDevices($id, int $page = 1, int $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/users/$id/devices", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'users';
    }
}
