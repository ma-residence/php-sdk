<?php

namespace MR\SDK\Endpoints;

class NotificationEndpoint extends Endpoint
{
    /**
     * @param $diffusionId
     * @return \MR\SDK\Transport\Response
     */
    public function getDiffusionRecipients($diffusionId)
    {
        return $this->request->get("/notifications/diffusions/$diffusionId/recipients");
    }

    /**
     * @param $sourceId
     * @param $targetId
     * @param $roleId
     * @return \MR\SDK\Transport\Response
     */
    public function getMembersOfRecipients($sourceId, $targetId, $roleId)
    {
        return $this->request->get("/notifications/members/$sourceId/$targetId/$roleId/recipients");
    }

    /**
     * @param $userId
     * @return \MR\SDK\Transport\Response
     */
    public function getUserRecipients($userId)
    {
        return $this->request->get("/notifications/users/$userId/recipients");
    }

    /**
     * @param $commentId
     * @return \MR\SDK\Transport\Response
     */
    public function getCommentRecipients($commentId)
    {
        return $this->request->get("/notifications/comments/$commentId/recipients");
    }

    /**
     * @param $shareId
     * @return \MR\SDK\Transport\Response
     */
    public function getShareRecipients($shareId)
    {
        return $this->request->get("/notifications/shares/$shareId/recipients");
    }

    /**
     * @param $recommendationId
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendationRecipients($recommendationId)
    {
        return $this->request->get("/notifications/recommendations/$recommendationId/recipients");
    }

    /**
     * @param $targetType
     * @param $targetId
     * @return \MR\SDK\Transport\Response
     */
    public function getParticipateRecipients($targetType, $targetId)
    {
        return $this->request->get("/notifications/participates/$targetType/$targetId/recipients");
    }

    /**
     * @param $targetType
     * @param $targetId
     * @return \MR\SDK\Transport\Response
     */
    public function getLikeRecipients($targetType, $targetId)
    {
        return $this->request->get("/notifications/likes/$targetType/$targetId/recipients");
    }

    /**
     * @param $targetType
     * @param $targetId
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowRecipients($targetType, $targetId)
    {
        return $this->request->get("/notifications/follows/$targetType/$targetId/recipients");
    }
}
