<?php

namespace SymfonyBundles\RedisBundle\Redis;

class Client extends \Predis\Client implements ClientInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct($parameters = null, $options = null)
    {
        if (is_array($parameters) && \count($parameters) === 1) {
            $parameters = \array_shift($parameters);
        }

        parent::__construct($parameters, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function pop(string $key): ?string
    {
        $result = $this->call('lpop', [$key]);

        return null === $result ? null : (string) $result;
    }

    /**
     * {@inheritdoc}
     */
    public function push(string $key, ...$values): int
    {
        return (int) $this->call('rpush', array_merge([$key], $values));
    }

    /**
     * {@inheritdoc}
     */
    public function count(string $key): int
    {
        return (int) $this->call('llen', [$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(string $key): int
    {
        return (int) $this->call('del', [$key]);
    }

    /**
     * Creates a Redis command with the specified arguments and sends a request to the server.
     *
     * @param string  $command   the command ID
     * @param mixed[] $arguments the arguments for the command
     *
     * @return int|bool|string|float|null
     */
    protected function call(string $command, array $arguments = [])
    {
        /** @var int|bool|string|float|null $result */
        $result = $this->executeCommand($this->createCommand($command, $arguments));

        return $result;
    }
}
