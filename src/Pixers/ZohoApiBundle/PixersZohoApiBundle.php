<?php

namespace Pixers\ZohoApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Pixers\ZohoApiBundle\DependencyInjection\Compiler\SetGuzzleClientCompilerPass;

/**
 * ZohoApiBundle
 *
 * @author Michał Kanak <kanakmichal@gmail.com>
 * @copyright 2017 PIXERS Ltd
 */
class PixersZohoApiBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        
        $container->addCompilerPass(new SetGuzzleClientCompilerPass());
    }
}