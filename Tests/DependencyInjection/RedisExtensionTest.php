<?php

namespace SymfonyBundles\RedisBundle\Tests\DependencyInjection;

use SymfonyBundles\RedisBundle\Tests\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use SymfonyBundles\RedisBundle\DependencyInjection\RedisExtension;

class RedisExtensionTest extends TestCase
{

    public function testHasServices()
    {
        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $this->assertInstanceOf(Extension::class, $extension);

        $extension->load([], $container);

        $this->assertTrue($container->has('sb_redis.client.default'));
    }

    public function testClientAlias()
    {
        $config = ['sb_redis' => ['clients' => ['test' => ['alias' => 'test']]]];

        $extension = new RedisExtension();
        $container = new ContainerBuilder();

        $this->assertFalse($container->has('test'));

        $extension->load($config, $container);

        $this->assertTrue($container->has('test'));
    }

    public function testAlias()
    {
        $extension = new RedisExtension();

        $this->assertStringEndsWith('redis', $extension->getAlias());
    }

}
