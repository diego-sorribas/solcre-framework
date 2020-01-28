<?php

namespace Solcre\SolcreFramework2\Filter\Factory;

use Interop\Container\ContainerInterface;
use Solcre\SolcreFramework2\Filter\FieldsFilterService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\View\HelperPluginManager;

class FieldsFilterServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $helpers = $container->get('ViewHelperManager');
        if (($helpers instanceof HelperPluginManager) && $helpers->has('Hal')) {
            $halPlugin = $helpers->get('Hal');

            return new FieldsFilterService($halPlugin);
        }
    }
}
