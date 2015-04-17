<?php

namespace Kristofvc\Bundle\ContactBundle;

use Kristofvc\Bundle\ContactBundle\DependencyInjection\KristofvcContactExtension;
use Kristofvc\Bundle\ContactBundle\DependencyInjection\ValidationCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KristofvcContactBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new KristofvcContactExtension();
    }
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ValidationCompilerPass());
    }
}
