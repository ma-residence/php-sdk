<?php

namespace MR\SDK\TokenStorage;

class InMemoryTokenStorage implements TokenStorageInterface
{
    /**
     * @var array[]
     */
    private $store = [];

    /**
     * {@inheritdoc}
     */
    public function save($key, array $token)
    {
        $this->store[$key] = $token;

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->has($key) ? $this->store[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return isset($this->store[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        if ($this->has($key)) {
            unset($this->store[$key]);

            return true;
        }

        return false;
    }
}
