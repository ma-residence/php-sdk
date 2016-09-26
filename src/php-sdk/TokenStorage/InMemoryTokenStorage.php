<?php

namespace MR\SDK\TokenStorage;

class InMemoryTokenStorage implements TokenStorageInterface
{
    /**
     * @var array
     */
    private $store = [];

    /**
     * {@inheritdoc}
     */
    public function set($key, $token, $ttl = 0)
    {
        $this->store[$key] = $token;

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return isset($this->store[$key]) ? $this->store[$key] : null;
    }
}
