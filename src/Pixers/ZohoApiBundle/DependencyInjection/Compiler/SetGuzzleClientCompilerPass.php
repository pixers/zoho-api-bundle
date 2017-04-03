<?php

namespace Pixers\ZohoApiBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * SetGuzzleClientCompilerPass
 *
 * @author Michał Kanak <kanakmichal@gmail.com>
 * @copyright 2017 PIXERS Ltd
 */
class SetGuzzleClientCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!isset($container->getParameter('pixers_zoho_api')['guzzle_client'])) {
            return;
        }
        $salesManagoClient = $container->findDefinition('pixers_zoho.client');
        $salesManagoClient->addMethodCall(
            'setGuzzleClient',
            [new Reference($container->getParameter('pixers_zoho_api')['guzzle_client'])]
        );
    }
}