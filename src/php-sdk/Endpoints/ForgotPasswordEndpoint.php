<?php

namespace MR\SDK\Endpoints;

class ForgotPasswordEndPoint extends Endpoint
{
    public function postRequest(array $data)
    {
        return $this->request->post('/forgot-password/request', [], $data);
    }

    public function getReset($token, array $data)
    {
        return $this->request->get('/forgot-password/reset/'.$token, [], $data);
    }

    public function postReset($token, array $data)
    {
        return $this->request->patch('/forgot-password/reset/'.$token, [], $data);
    }
}
