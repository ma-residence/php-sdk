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
    public function put(array $data)
    {
        return $this->request->put('/me', [], $data);
    }

    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function patch(array $data)
    {
        return $this->request->patch('/me', [], $data);
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function delete()
    {
        return $this->request->delete('/me');
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
     *
     * @return \MR\SDK\Transport\Response
     */
    public function deleteEmail($emailId)
    {
        return $this->request->delete('/me/emails/'.$emailId);
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
     * @return \MR\SDK\Transport\Response
     */
    public function getActivity()
    {
        return $this->request->get('/me/activity');
    }

    /**
     * @param string $type
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getFollows($type)
    {
        return $this->request->get('/me/follows/'.$type);
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getFollowers()
    {
        return $this->request->get('/me/followers');
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
     * @return \MR\SDK\Transport\Response
     */
    public function getRecommendations()
    {
        return $this->request->get('/me/recommendations');
    }

    /**
     * @return \MR\SDK\Transport\Response
     */
    public function getDevices()
    {
        return $this->request->get('/me/devices');
    }
}
