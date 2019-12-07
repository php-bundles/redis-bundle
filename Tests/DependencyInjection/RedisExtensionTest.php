<?php

namespace SymfonyBundles\RedisBundle\Tests\DependencyInjection;

use SymfonyBundles\RedisBundle\Tests\TestCase;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use SymfonyBundles\RedisBundle\DependencyInjection\RedisExtension;

class RedisExtensionTest extends TestCase
{
    public function testHasServices(): void
    {
        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $this->assertInstanceOf(Extension::class, $extension);

        $extension->load([], $container);

        $this->assertTrue($container->has('sb_redis.default'));
        $this->assertTrue($container->has(ClientInterface::class));
    }

    public function testClientAlias(): void
    {
        $config = ['sb_redis' => ['clients' => ['test' => []]]];

        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $this->assertFalse($container->has(ClientInterface::class));

        $extension->load($config, $container);

        $this->assertTrue($container->has(ClientInterface::class));
    }

    public function testAlias(): void
    {
        $extension = new RedisExtension();

        $this->assertStringEndsWith('redis', $extension->getAlias());
    }
}
