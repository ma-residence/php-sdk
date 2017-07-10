<?php

namespace MR\SDK\Endpoints;

class NotificationEndpoint extends Endpoint
{
    /**
     * @param $diffusionId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getDiffusionRecipients($diffusionId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/diffusions/$diffusionId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $sourceId
     * @param $targetId
     * @param $roleId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMembersOfRecipients($sourceId, $targetId, $roleId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/members/$sourceId/$targetId/$roleId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $sourceId
     * @param $targetId
     * @param $roleId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getJoinRequestRecipients($sourceId, $targetId, $roleId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/joins/$sourceId/$targetId/$roleId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $userId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getUserRecipients($userId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/users/$userId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param string $userId
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getUserFollowersRecipients($userId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->getEntityFollowersRecipients($userId, 'user', $page, $perPage, $extraParams);
    }

    /**
     * @param string $id
     * @param string $modelType
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getEntityFollowersRecipients($id, $modelType, $page = 1, $perPage = 100, $extraParams = [])
    {
        $routeType = sprintf('%ss', str_replace('_', '-', $modelType));
        return $this->request->get(sprintf('/notifications/%s/%s/followers/recipients', $routeType, $id), array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $commentId
     * @param string $type
     * @param int    $page
     * @param int    $perPage
     * @param array  $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getCommentRecipients($commentId, $type = 'author', $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/comments/$commentId/recipients", array_merge([
            'type' => $type,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $shareId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getShareRecipients($shareId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/shares/$shareId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $recommendationId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendationRecipients($recommendationId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/recommendations/$recommendationId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getParticipateRecipients($targetType, $targetId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/participates/$targetType/$targetId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getLikeRecipients($targetType, $targetId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/likes/$targetType/$targetId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $targetType
     * @param $targetId
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowRecipients($targetType, $targetId, $page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get("/notifications/follows/$targetType/$targetId/recipients", array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getOpenTomorrow($page = 1, $perPage = 100, $extraParams = [])
    {
        return $this->request->get('/notifications/markets/open-tomorrow', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }
}
