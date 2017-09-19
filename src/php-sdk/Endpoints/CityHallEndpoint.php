<?php

namespace MR\SDK\Endpoints;

class CityHallEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\MembersTrait;
    use Traits\FollowersTrait;
    use Traits\ActivityTrait;
    use Traits\SettingsTrait;
    use Traits\RecommendationsTrait;

    /**
     * @param string $id
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getCustomers($id, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get("/city-halls/$id/customers", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    public static function getBaseUri(): string
    {
        return 'city-halls';
    }
}
