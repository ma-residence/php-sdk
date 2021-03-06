<?php

namespace MR\SDK\Endpoints;

class RealEstatePlayerEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\SettingsTrait;
    use Traits\MembersTrait;
    use Traits\FollowersTrait;
    use Traits\RecommendationsTrait;
    use Traits\ActivityTrait;

    public static function getBaseUri(): string
    {
        return 'real-estate-players';
    }
}
