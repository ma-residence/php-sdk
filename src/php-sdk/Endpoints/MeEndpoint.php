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
            'new' => $new
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
}
