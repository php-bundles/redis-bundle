<?php

namespace SymfonyBundles\RedisBundle\Tests\DependencyInjection;

use SymfonyBundles\RedisBundle\Tests\TestCase;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use SymfonyBundles\RedisBundle\DependencyInjection\Configuration;

class ConfigurationTest extends TestCase
{
    public function testConfiguration()
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $this->assertInstanceOf(ConfigurationInterface::class, $configuration);

        $configs = $processor->processConfiguration($configuration, []);

        $this->assertSame(['clients' => ['default' => ['$parameters' => [], '$options' => []]]], $configs);
    }
}
