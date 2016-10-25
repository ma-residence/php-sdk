<?php

namespace MR\SDK\Endpoints;

interface SettingsEndpointInterface
{
    /**
     * @param string $id
     * @param string $key
     * @param string $value
     *
     * @return \MR\SDK\Transport\Response
     */
    public function putSettings($id, $key, $value);
}
