<?php

namespace MR\SDK\TokenStorage;

interface TokenStorageInterface
{
    /**
     * Set token to storage.
     *
     * @param string $key
     * @param string $token
     * @param int    $ttl
     *
     * @return mixed
     */
    public function set($key, $token, $ttl);

    /**
     * Get token from storage.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key);
}
