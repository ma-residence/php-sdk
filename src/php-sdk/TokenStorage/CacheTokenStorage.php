<?php

namespace MR\SDK\TokenStorage;

use Psr\Cache\CacheItemPoolInterface;

class CacheTokenStorage implements TokenStorageInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @param CacheItemPoolInterface $cache
     */
    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param $key
     * @param $token
     * @param int $ttl
     * @return mixed
     */
    public function set($key, $token, $ttl = 0)
    {
        $item = $this->cache->getItem($key);
        $item->set($token);

        return $this->cache->save($item);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $item = $this->cache->getItem($key);

        return $item->get();
    }
}
