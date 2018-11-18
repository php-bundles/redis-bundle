<?php

namespace SymfonyBundles\RedisBundle\DependencyInjection;

use SymfonyBundles\RedisBundle\Redis;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class RedisExtension extends ConfigurableExtension
{
    /**
     * {@inheritdoc}
     */
    protected function loadInternal(array $configs, ContainerBuilder $container)
    {
        $factoryReference = new Reference(Redis\FactoryInterface::class);
        $container->setDefinition($factoryReference, new Definition(Redis\Factory::class));

        foreach ($configs['clients'] as $name => $arguments) {
            $definition = new Definition(Redis\Client::class);
            $definition->setFactory([$factoryReference, 'create']);
            $definition->setArguments([$arguments['$parameters'], $arguments['$options']]);
            $definition->setPublic(true);

            $container->setDefinition(sprintf('%s.%s', $this->getAlias(), $name), $definition);

            if (false === $container->hasDefinition(Redis\ClientInterface::class)) {
                $container->setDefinition(Redis\ClientInterface::class, $definition);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias(): string
    {
        return 'sb_redis';
    }
}
