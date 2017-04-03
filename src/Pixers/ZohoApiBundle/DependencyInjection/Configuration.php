<?php

namespace Pixers\ZohoApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 *
 * @author Michał Kanak <kanakmichal@gmail.com>
 * @copyright 2017 PIXERS Ltd
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pixers_zoho_api')
            ->children()
                ->scalarNode('authtoken')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('endpoint')->cannotBeEmpty()->defaultValue('https://crm.zoho.com/crm/private/json/')->end()
                ->scalarNode('guzzle_client')->cannotBeEmpty()->end()
            ->end();
        
        return $treeBuilder;
    }
}