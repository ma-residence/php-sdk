<?php

namespace MR\SDK\Endpoints;

use MR\SDK\Transport\Response;

interface SettingsEndpointInterface
{
    public function putSettings(string $id, string $key, string $value): Response;
}
