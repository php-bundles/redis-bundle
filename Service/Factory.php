<?php

namespace SymfonyBundles\RedisBundle\Service;

class Factory implements FactoryInterface
{

    /**
     * @var string
     */
    protected static $clientClass;

    /**
     * @param string $clientClass
     */
    public function __construct($clientClass = null)
    {
        if (null === $clientClass) {
            $clientClass = Client::class;
        }

        static::$clientClass = $clientClass;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(array $parameters = [], array $options = [])
    {
        return new static::$clientClass($parameters, $options);
    }

}
