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
     * {@inheritDoc}
     */
    public function save($key, array $token)
    {
        $item = $this->cache->getItem($key);
        $item->set(serialize($token));
        $item->expiresAfter($token['lifetime']);

        return $this->cache->save($item);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        $item = $this->cache->getItem($key);

        return $item->isHit() ? $item->get() : false;
    }

    /**
     * {@inheritDoc}
     */
    public function has($key)
    {
        return $this->cache->getItem($key)->isHit();
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
        return $this->cache->deleteItem($key);
    }
}
