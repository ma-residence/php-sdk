<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

interface ResourceEndpointInterface
{
    public function get(string $id): Response;
    public function post(array $data = []): Response;
    public function put(string $id, array $data = []): Response;
    public function patch(string $id, array $data = []): Response;
    public function delete(string $id): Response;
}
