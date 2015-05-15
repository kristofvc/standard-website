<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Kristofvc\Bundle\ContactBundle\KristofvcContactBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * Add the custom compiler passes.
     *
     * @return array
     */
    public function getCustomCompilerPasses()
    {
        return [

        ];
    }

    /**
     * Add the custom extensions to the container.
     *
     * This method is added in the prepareContainer after all the bundle logic.
     * All the extensions configured in the customExtensions method.
     *
     * @param ContainerBuilder $container
     * @return array
     */
    private function registerCustomCompilerPasses(ContainerBuilder $container)
    {
        foreach ($this->getCustomCompilerPasses() as $compilerPass) {
            $container->addCompilerPass($compilerPass);
        }

        return $container;
    }

    /**
     * @return ContainerBuilder
     */
    protected function buildContainer()
    {
        $container = parent::buildContainer();

        // Custom .. needs to be reviewed
        $container = $this->registerCustomCompilerPasses($container);

        return $container;
    }
}
