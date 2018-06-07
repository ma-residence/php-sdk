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

    /**
     * @param string $associationId
     * @param string $invitationToken
     *
     * @return \MR\SDK\Transport\Response
     */
    public function acceptAssociationInvitation(string $associationId, string $invitationToken)
    {
        return $this->request->put("/{$this::getBaseUri()}/$associationId/invitations/$invitationToken/accept", [], []);
    }
}
