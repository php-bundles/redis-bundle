<?php

namespace SymfonyBundles\RedisBundle\Redis;

class Factory implements FactoryInterface
{
    /**
     * @var string
     */
    protected static $clientClass = Client::class;

    /**
     * {@inheritdoc}
     */
    public static function create(array $parameters = [], array $options = []): ClientInterface
    {
        /** @var ClientInterface $client */
        $client = new static::$clientClass($parameters, $options);

        return $client;
    }
}
