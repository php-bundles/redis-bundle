<?php

namespace SymfonyBundles\RedisBundle\Redis;

interface ClientInterface extends \Predis\ClientInterface
{
    /**
     * Removes and returns the first element of the list stored at key.
     *
     * @param string $key
     *
     * @return null|string The value of the first element, or nil when key does not exist.
     *
     * @see ClientInterface::lpop()
     */
    public function pop(string $key): ?string;

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
    public function push(string $key, ...$values): int;

    /**
     * Returns the length of the list stored at key.
     * If key does not exist, it is interpreted as an empty list and 0 is returned.
     * An error is returned when the value stored at key is not a list.
     *
     * @param string $key
     *
     * @return int The length of the list at key.
     *
     * @see ClientInterface::llen()
     */
    public function count(string $key): int;

    /**
     * Removes the specified keys.
     * A key is ignored if it does not exist.
     *
     * @param string $key
     *
     * @return int The number of keys that were removed.
     *
     * @see ClientInterface::del()
     */
    public function remove(string $key): int;
}
