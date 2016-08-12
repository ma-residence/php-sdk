<?php

namespace MR\Transport;

use GuzzleHttp\Client;
use MR\MRClient;

class Request
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var MRClient
     */
    private $client;

    /**
     * @var string
     */
    private $host;

    /**
     * @param MRClient $client
     * @param string $host
     */
    public function __construct(MRClient $client, $host)
    {
        $this->client = $client;
        $this->host = $host;
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    public function get($endpoint, array $parameters = [], array $data = [])
    {
        return $this->execute('GET', $endpoint, $parameters, $data);
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    public function post($endpoint, array $parameters = [], array $data = [])
    {
        return $this->execute('POST', $endpoint, $parameters, $data);
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    public function put($endpoint, array $parameters = [], array $data = [])
    {
        return $this->execute('PUT', $endpoint, $parameters, $data);
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    public function patch($endpoint, array $parameters = [], array $data = [])
    {
        return $this->execute('PATCH', $endpoint, $parameters, $data);
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    public function delete($endpoint, array $parameters = [], array $data = [])
    {
        return $this->execute('DELETE', $endpoint, $parameters, $data);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $parameters
     * @param array $data
     *
     * @return Response
     */
    private function execute($method, $endpoint, array $parameters = [], array $data = [])
    {
        if (null !== $accessToken = $this->client->auth()->getAccessToken()) {
            $parameters['access_token'] = $accessToken;
        }

        return $this->httpClient->request($method, $this->host . $endpoint, [
            'query' => $parameters,
            'json' => $data,
        ]);
    }
}
