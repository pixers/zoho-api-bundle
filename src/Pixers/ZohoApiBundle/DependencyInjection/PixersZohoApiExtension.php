<?php

namespace Pixers\ZohoApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Reference;

use Pixers\ZohoApi\Client as ZohoApiClient;
use Pixers\ZohoApi\ZohoApi;

/**
 * PixersZohoApiExtension
 *
 * @author Michał Kanak <kanakmichal@gmail.com>
 * @copyright 2017 PIXERS Ltd
 */
class PixersZohoApiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('pixers_zoho_api', $config);
        $container->register('pixers_zoho.client', ZohoApiClient::class)
            ->addArgument($config['authtoken'])
            ->addArgument($config['endpoint']);

        $container->register('zoho', ZohoApi::class)
            ->addArgument(new Reference('pixers_zoho.client'));
    }
}