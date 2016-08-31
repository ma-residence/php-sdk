<?php

namespace MR\SDK\Exceptions;

use MR\SDK\Transport\Response;

class OAuthException extends \Exception
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        parent::__construct($response->getData()['error_description'], 401, null);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
