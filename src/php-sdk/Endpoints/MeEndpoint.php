<?php

namespace MR\SDK\Endpoints;

class MeEndpoint extends Endpoint
{
    /**
     * @return \MR\SDK\Transport\Response
     */
    public function get()
    {
        return $this->request->get('/me');
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function put(array $data = [])
    {
        return $this->request->put('/me', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch(array $data = [])
    {
        return $this->request->patch('/me', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function delete(array $data = [])
    {
        return $this->request->delete('/me', [], $data);
    }

    /**
     * @param string $old
     * @param string $new
     *
     * @return \MR\SDK\Transport\Response
     */
    public function changePassword($old, $new)
    {
        return $this->request->put('/me/password', [], [
            'old' => $old,
            'new' => $new,
        ]);
    }

    /**
     * @param string $email
     *
     * @return \MR\SDK\Transport\Response
     */
    public function postEmail($email)
    {
        return $this->request->post('/me/emails', [], [
            'email' => $email,
        ]);
    }

    /**
     * @param string $emailId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getEmail($emailId)
    {
        return $this->request->get('/me/emails/'.$emailId);
    }

    /**
     * @param string $emailId
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function deleteEmail($emailId, array $data = [])
    {
        return $this->request->delete('/me/emails/'.$emailId, [], $data);
    }

    /**
     * @param string $type
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getMemberOf($type)
    {
        return $this->request->get('/me/member-of/'.$type);
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/me/activity', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param $type
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollows($type, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/me/follows/'.$type, array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers($page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/me/followers', array_merge([
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getSettings()
    {
        return $this->request->get('/me/settings');
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return \MR\SDK\Transport\Response
     */
    public function putSettings($key, $value)
    {
        return $this->request->put("/me/settings/$key", [], [
            'value' => $value,
        ]);
    }

    /**
     * @param null  $type
     * @param int   $page
     * @param int   $perPage
     * @param array $extraParams
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations($type = null, $page = 1, $perPage = 20, $extraParams = [])
    {
        return $this->request->get('/me/recommendations', array_merge([
            'type' => $type,
            'page' => $page,
            'per_page' => $perPage,
        ], $extraParams));
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getNotifications()
    {
        return $this->request->get('/me/notifications');
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getDevices()
    {
        return $this->request->get('/me/devices');
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function postLendObject(array $data = [])
    {
        return $this->request->post('/me/lend-objects', [], $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function deleteLendObject($id, array $data = [])
    {
        return $this->request->delete('/me/lend-objects/'.$id, [], $data);
    }

    /**
     * @param string $type
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getJoinRequestList($type)
    {
        return $this->request->get("/me/join-request/$type");
    }

    /**
     * @param string $type
     * @param string $targetId
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getJoinRequest($type, $targetId)
    {
        return $this->request->get("/me/join-request/$type/$targetId");
    }
}
