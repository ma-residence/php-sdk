<?php

namespace MR\SDK\TokenStorage;

class FileTokenStorage implements TokenStorageInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @param string $path directory that stores the key files
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * {@inheritdoc}
     */
    public function save($key, array $token)
    {
        return file_put_contents("{$this->path}/{$key}", json_encode($token, JSON_PRETTY_PRINT), LOCK_EX) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return file_exists($key);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->has($key)
            ? json_decode(file_get_contents("{$this->path}/{$key}"), true)
            : false;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        return unlink("{$this->path}/{$key}");
    }
}
