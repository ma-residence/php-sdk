<?php

namespace MR\SDK\Transport;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use MR\SDK\Client;

class Request
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     * @param string $host
     */
    public function __construct(Client $client, $host, HandlerStack $handlerStack = null)
    {
        $this->client = $client;

        $options = ['base_uri' => $host];

        if ($handlerStack) {
            $options['handler'] = $handlerStack;

        }

        $this->httpClient = new HttpClient($options);
    }

    /**
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     *
     * @return Response
     */
    public function get($endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        return $this->execute('GET', $endpoint, $parameters, $data, $options);
    }

    /**
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     *
     * @return Response
     */
    public function post($endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        return $this->execute('POST', $endpoint, $parameters, $data, $options);
    }

    /**
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     *
     * @return Response
     */
    public function put($endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        return $this->execute('PUT', $endpoint, $parameters, $data, $options);
    }

    /**
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     *
     * @return Response
     */
    public function patch($endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        return $this->execute('PATCH', $endpoint, $parameters, $data, $options);
    }

    /**
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     *
     * @return Response
     */
    public function delete($endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        return $this->execute('DELETE', $endpoint, $parameters, $data, $options);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array  $parameters
     * @param array  $data
     * @param array  $options
     *
     * @return Response
     */
    public function execute($method, $endpoint, array $parameters = [], array $data = [], array $options = [])
    {
        $headers = [];
        if (!(isset($options['anonymous']) && $options['anonymous'])) {
            if (null !== $accessToken = $this->client->auth()->getAccessToken()) {
                $headers['Authorization'] = "Bearer $accessToken";
            }
        }

        if (array_key_exists('contentType', $options)) {
            $headers['Content-Type'] = $options['contentType'];
        }

        if (array_key_exists('contentLength', $options)) {
            $headers['Content-Length'] = $options['contentLength'];
        }

        try {
            $response = $this->httpClient->request($method, $endpoint, [
                'query' => $parameters,
                'headers' => $headers,
                'json' => [
                    'data' => $data,
                ],
            ] + $options);
        } catch (RequestException $re) {
            $response = $re->getResponse();
        }

        return new Response($response);
    }
}
