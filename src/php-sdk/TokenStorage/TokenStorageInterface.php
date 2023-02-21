<?php

namespace MR\SDK\TokenStorage;

interface TokenStorageInterface
{
    public function get(string $key): ?array;

    public function save(string $key, array $token): bool;

    public function has(string $key): bool;

    public function remove(string $key): bool;
}
