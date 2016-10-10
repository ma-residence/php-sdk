<?php

namespace MR\SDK\Endpoints;

class NotificationEndpoint extends Endpoint
{
    /**
     * @param $diffusionId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getDiffusionRecipients($diffusionId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/diffusions/$diffusionId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $sourceId
     * @param $targetId
     * @param $roleId
     * @return \MR\SDK\Transport\Response
     */
    public function getMembersOfRecipients($sourceId, $targetId, $roleId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/members/$sourceId/$targetId/$roleId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $userId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getUserRecipients($userId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/users/$userId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $commentId
     * @param string $type
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getCommentRecipients($commentId, $type = 'author', $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/comments/$commentId/recipients", [
            'type' => $type,
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $shareId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getShareRecipients($shareId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/shares/$shareId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $recommendationId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendationRecipients($recommendationId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/recommendations/$recommendationId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getParticipateRecipients($targetType, $targetId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/participates/$targetType/$targetId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getLikeRecipients($targetType, $targetId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/likes/$targetType/$targetId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $per_page
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowRecipients($targetType, $targetId, $page = 1, $per_page = 100)
    {
        return $this->request->get("/notifications/follows/$targetType/$targetId/recipients", [
            'page' => $page,
            'per_page' => $per_page,
        ]);
    }
}
