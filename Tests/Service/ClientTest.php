<?php

namespace SymfonyBundles\RedisBundle\Tests\DependencyInjection;

use SymfonyBundles\RedisBundle\Tests\TestCase;
use SymfonyBundles\RedisBundle\Service\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use SymfonyBundles\RedisBundle\DependencyInjection\RedisExtension;

class ClientTest extends TestCase
{
    public function testDefaultClass()
    {
        $config = ['sb_redis' => ['class' => ['client' => null]]];
        $client = $this->loadExtension($config)->get('test.client');

        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    public function testPush()
    {
        $client = $this->loadExtension()->get('test.client');

        $this->assertSame(0, $client->llen('mykey'));
        $this->assertSame(1, $client->push('mykey', 'foo'));
        $this->assertSame(3, $client->push('mykey', 'bar', 'baz'));
        $this->assertSame(3, $client->llen('mykey'));
    }

    private function loadExtension(array $config = [])
    {
        $defaults = ['sb_redis' => [
                'clients' => [
                    'test' => [
                        'alias' => 'test.client',
                    ],
                ],
            ],
        ];

        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $extension->load(array_merge_recursive($defaults, $config), $container);

        return $container;
    }
}
