<?php

namespace SymfonyBundles\RedisBundle\DependencyInjection;

use SymfonyBundles\RedisBundle\Service;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $rootNode = $builder->root('sb_redis');

        $this->addClassSection($rootNode);
        $this->addClientsSection($rootNode);

        return $builder;
    }

    /**
     * Adds the sb_redis.class configuration.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addClassSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('client')
                            ->defaultValue(Service\Client::class)
                        ->end()
                        ->scalarNode('factory')
                            ->defaultValue(Service\Factory::class)
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Adds the sb_redis.clients configuration.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addClientsSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('clients')
                    ->addDefaultChildrenIfNoneSet('default')
                    ->useAttributeAsKey('default')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('alias')->defaultNull()->end()
                            ->arrayNode('$parameters')
                                ->prototype('variable')->end()
                            ->end()
                            ->arrayNode('$options')
                                ->prototype('variable')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

}
