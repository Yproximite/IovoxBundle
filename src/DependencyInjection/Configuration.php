<?php

namespace Yproximite\IovoxBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('iovox');
        $rootNode    = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->scalarNode('example')->info('example info')->end()
            ->scalarNode('example_with_default_value')->defaultValue('var')->end()
            ->end();

        return $treeBuilder;
    }
}
