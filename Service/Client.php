<?php

namespace SymfonyBundles\RedisBundle\Service;

class Client extends \Predis\Client implements ClientInterface
{
    /**
     * {@inheritdoc}
     */
    public function push($key, ...$values)
    {
        return $this->call('rpush', array_merge([$key], $values));
    }

    /**
     * Creates a Redis command with the specified arguments and sends a request
     * to the server.
     *
     * @param string $command   The command ID.
     * @param array  $arguments The arguments for the command.
     *
     * @return mixed
     */
    protected function call($command, array $arguments = [])
    {
        return $this->executeCommand(
                $this->createCommand($command, $arguments)
        );
    }
}
