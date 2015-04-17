<?php

namespace Kristofvc\Bundle\ContactBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\File;

class ValidationCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('validator.builder')) {
            return;
        }

        $validationDir = $container->getParameter('kernel.root_dir'). '/../src/component/Contact/src/Resources/config/validation';

        if (!is_dir($validationDir)) {
            return;
        }

        $finder = new Finder();
        $finder->files()->name('*.xml')->in($validationDir);

        $files = [];
        /** @var File $file */
        foreach ($finder as $file) {
            $files[] = $file->getRealPath();
        }

        if (!empty($files)) {
            $container->getDefinition('validator.builder')->addMethodCall('addXmlMappings', [$files]);
        }
    }
}
