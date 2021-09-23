<?php

declare(strict_types=1);

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
            ->scalarNode('endpoint')->end()
            ->scalarNode('username')->end()
            ->scalarNode('secure_key')->end()
            ->end();

        return $treeBuilder;
    }
}
