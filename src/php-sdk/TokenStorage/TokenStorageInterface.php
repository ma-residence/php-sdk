<?php

namespace MR\SDK\TokenStorage;

interface TokenStorageInterface
{
    /**
     * Set token to storage
     *
     * @param $key
     * @param $token
     * @param $ttl
     *
     * @return mixed
     */
    public function set($key, $token, $ttl);

    /**
     * Get token from storage
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key);
}
