<?php

namespace MR\SDK\Transport;

class Response
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $content;

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
        $this->decodeContent();
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return array|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->response->getHeaderLine('location');
    }

    /**
     * @return bool
     */
    public function isPaginate()
    {
        return $this->response->getStatusCode() === 206;
    }

    private function decodeContent()
    {
        $this->content = $this->response->getBody()->getContents();

        if ($this->response->getStatusCode() === 204 || $this->content === null || $this->content === '') {
            return;
        }

        $data = \GuzzleHttp\json_decode($this->content, true);

        $this->errors = isset($data['errors']) ? $data['errors'] : null;
        $this->metadata = isset($data['metadata']) ? $data['metadata'] : null;
        $this->data = isset($data['data']) ? $data['data'] : null;
    }
}
