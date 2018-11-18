<?php

namespace SymfonyBundles\RedisBundle\Redis;

class Client extends \Predis\Client implements ClientInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct($parameters = null, $options = null)
    {
        if (\count($parameters) === 1) {
            $parameters = \array_shift($parameters);
        }

        parent::__construct($parameters, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function pop(string $key): ?string
    {
        return $this->call('lpop', [$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function push(string $key, ...$values): int
    {
        return $this->call('rpush', array_merge([$key], $values));
    }

    /**
     * {@inheritdoc}
     */
    public function count(string $key): int
    {
        return $this->call('llen', [$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(string $key): int
    {
        return $this->call('del', [$key]);
    }

    /**
     * Creates a Redis command with the specified arguments and sends a request to the server.
     *
     * @param string $command   the command ID
     * @param array  $arguments the arguments for the command
     *
     * @return mixed
     */
    protected function call($command, array $arguments = [])
    {
        return $this->executeCommand($this->createCommand($command, $arguments));
    }
}
