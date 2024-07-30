<?php

namespace SymfonyBundles\RedisBundle\Redis;

interface FactoryInterface
{
    /**
     * Creates single or aggregate connections from different types of arguments.
     *
     * @param mixed[] $parameters Connection parameters.
     * @param mixed[] $options    Client options.
     *
     * @return ClientInterface
     */
    public static function create(array $parameters = [], array $options = []): ClientInterface;
}
