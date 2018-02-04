<?php

namespace SymfonyBundles\RedisBundle\Tests\Redis;

use SymfonyBundles\RedisBundle\Tests\TestCase;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use SymfonyBundles\RedisBundle\DependencyInjection\RedisExtension;

class ClientTest extends TestCase
{
    public function testDefaultClass()
    {
        $client = $this->getClient(['sb_redis' => []]);

        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    public function testPush()
    {
        $client = $this->getClient();

        $client->remove('mykey');

        $this->assertSame(0, $client->count('mykey'));
        $this->assertSame(1, $client->push('mykey', 'foo'));
        $this->assertSame(3, $client->push('mykey', 'bar', 'baz'));
        $this->assertSame(3, $client->count('mykey'));
    }

    private function getClient(array $config = []): ClientInterface
    {
        return $this->loadExtension($config)->get(ClientInterface::class);
    }

    private function loadExtension(array $config = [])
    {
        $defaults = [
            'sb_redis' => [
                'clients' => [
                    'test' => [],
                ],
            ],
        ];

        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $extension->load(array_merge_recursive($defaults, $config), $container);

        return $container;
    }
}
