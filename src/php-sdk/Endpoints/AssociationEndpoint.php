<?php

namespace MR\SDK\Endpoints;

class AssociationEndpoint extends Endpoint implements ResourceEndpointInterface, SettingsEndpointInterface
{
    use Traits\ListTrait;
    use Traits\ResourceTrait;
    use Traits\MembersTrait;
    use Traits\FollowersTrait;
    use Traits\ActivityTrait;
    use Traits\SettingsTrait;
    use Traits\RecommendationsTrait;

    public static function getBaseUri(): string
    {
        return 'associations';
    }
}
