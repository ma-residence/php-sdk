<?php

namespace MR\SDK\TokenStorage;

interface TokenStorageInterface
{
    /**
     * Save token to storage.
     *
     * @param string $key
     * @param array  $token
     *
     * @return bool
     */
    public function save($key, array $token);

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key);

    /**
     * Get token from storage.
     *
     * @param string $key
     *
     * @return array|false
     */
    public function get($key);

    /**
     * Remove token from storage.
     *
     * @param string $key
     *
     * @return bool
     */
    public function remove($key);
}
