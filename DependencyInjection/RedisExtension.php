<?php

namespace SymfonyBundles\RedisBundle\DependencyInjection;

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
        foreach ($configs['class'] as $name => $class) {
            $container->setParameter(sprintf('sb_redis.class.%s', $name), $class);
        }

        $this->addClients($configs, $container);
    }

    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    private function addClients(array $configs, ContainerBuilder $container)
    {
        $factory = new Definition($configs['class']['factory']);
        $factoryReference = new Reference('sb_redis.client.factory');
        $factory->addArgument($configs['class']['client']);
        $container->setDefinition($factoryReference, $factory);

        foreach ($configs['clients'] as $name => $arguments) {
            $id = sprintf('sb_redis.client.%s', $name);

            if (null !== $arguments['alias']) {
                $container->setAlias($arguments['alias'], $id);
            }

            unset($arguments['alias']);

            $definition = new Definition($configs['class']['client']);
            $definition->setFactory([$factoryReference, 'create']);
            $definition->setArguments($arguments);
            $container->setDefinition($id, $definition);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'sb_redis';
    }
}
