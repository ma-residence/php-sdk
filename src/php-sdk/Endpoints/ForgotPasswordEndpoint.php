<?php

namespace MR\SDK\Endpoints;

class ForgotPasswordEndpoint extends Endpoint
{
    /**
     * @param array $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function postRequest(array $data = [])
    {
        return $this->request->post("/{$this::getBaseUri()}/request", [], $data);
    }

    /**
     * @param string $token
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function getReset($token, array $data = [])
    {
        return $this->request->get("/{$this::getBaseUri()}/reset/$token", [], $data);
    }

    /**
     * @param string $token
     * @param array  $data
     *
     * @return \MR\SDK\Transport\Response
     */
    public function postReset($token, array $data = [])
    {
        return $this->request->post("/{$this::getBaseUri()}/reset/$token", [], $data);
    }

    public static function getBaseUri(): string
    {
        return 'forgot-password';
    }
}
