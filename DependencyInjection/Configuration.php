<?php

namespace Mb\DoctrineLogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('mb_doctrine_log');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('ignore_properties')->prototype('scalar')->end()
            ->end()
            ->scalarNode('entity_manager')
                ->defaultValue('default')
            ->end()
            ->scalarNode('listener_class')
                ->defaultValue('Mb\DoctrineLogBundle\EventListener\Logger')
            ->end()
        ;

        return $treeBuilder;
    }
}
