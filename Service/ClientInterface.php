<?php

namespace SymfonyBundles\RedisBundle\Service;

interface ClientInterface extends \Predis\ClientInterface
{
    /**
     * Insert all the specified values at the tail of the list stored at key.
     *
     * @param string                $key
     * @param string|int|float|bool ...$values
     *
     * @return int The length of the list after the push operation.
     *
     * @see ClientInterface::rpush()
     */
    public function push($key, ...$values);
}
