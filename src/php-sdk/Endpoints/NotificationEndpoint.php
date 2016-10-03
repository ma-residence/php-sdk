<?php

namespace MR\SDK\Endpoints;

class NotificationEndpoint extends Endpoint
{
    /**
     * @param $diffusionId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getDiffusionRecipients($diffusionId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/diffusions/$diffusionId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $sourceId
     * @param $targetId
     * @param $roleId
     * @return \MR\SDK\Transport\Response
     */
    public function getMembersOfRecipients($sourceId, $targetId, $roleId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/members/$sourceId/$targetId/$roleId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $userId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getUserRecipients($userId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/users/$userId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $commentId
     * @param string $type
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getCommentRecipients($commentId, $type = 'author', $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/comments/$commentId/recipients", [
            'type' => $type,
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $shareId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getShareRecipients($shareId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/shares/$shareId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $recommendationId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendationRecipients($recommendationId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/recommendations/$recommendationId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getParticipateRecipients($targetType, $targetId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/participates/$targetType/$targetId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getLikeRecipients($targetType, $targetId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/likes/$targetType/$targetId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int $page
     * @param int $perPage
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowRecipients($targetType, $targetId, $page = 1, $perPage = 100)
    {
        return $this->request->get("/notifications/follows/$targetType/$targetId/recipients", [
            'page' => $page,
            'perPage' => $perPage,
        ]);
    }
}
