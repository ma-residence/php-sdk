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

    public static function getBaseUri(): string
    {
        return 'groups';
    }
}
