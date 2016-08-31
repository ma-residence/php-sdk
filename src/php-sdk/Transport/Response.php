<?php

namespace MR\SDK\Transport;

class Response
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $errors;

    /**
     * @var array
     */
    private $metadata;

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    private $response;

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        if ($this->data === null) {
            $this->decodeContent();
        }

        return !empty($this->data) ? $this->data : null;
    }

    /**
     * @return array|null
     */
    public function getErrors()
    {
        if ($this->errors === null) {
            $this->decodeContent();
        }

        return !empty($this->errors) ? $this->errors : null;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        if ($this->metadata === null) {
            $this->decodeContent();
        }

        return $this->metadata;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    private function decodeContent()
    {
        $content = $this->response->getBody()->getContents();

        if ($content === null || $content === '') {
            return;
        }

        $data = \GuzzleHttp\json_decode($content, true);

        $this->metadata = isset($data['metadata']) ? $data['metadata'] : [];
        unset($data['metadata']);

        $this->errors = isset($data['errors']) ? $data['errors'] : [];
        unset($data['errors']);

        $this->data = isset($data['data']) ? $data['data'] : $data;
    }
}
