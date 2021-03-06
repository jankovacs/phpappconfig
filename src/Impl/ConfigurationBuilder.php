<?php

namespace JanKovacs\PhpAppConfig\Impl;

use ArrayObject;
use JanKovacs\PhpAppConfig\ConfigurationBuilderInterface;
use JanKovacs\PhpAppConfig\ConfigurationProviderInterface;
use JanKovacs\PhpAppConfig\ConfiguratorContainerInterface;

class ConfigurationBuilder implements ConfigurationBuilderInterface
{

    /** @var \ArrayObject */
    protected $configurations;

    /** @var string */
    protected $environment;

    public function __construct(string $environment)
    {
        $this->environment = $environment;
        $this->configurations = new ArrayObject();
    }

    /**
     * @param \ArrayObject $configurations
     */
    protected function mergeConfigurations(ArrayObject $configurations):void
    {
        $configurations = $configurations->getArrayCopy();
        $existingConfigurations = $this->configurations->getArrayCopy();
        $bothConfigurations = array_merge($existingConfigurations, $configurations);
        $this->configurations = new ArrayObject($bothConfigurations);
    }

    /**
     * @inheritdoc
     */
    public function build(ConfiguratorContainerInterface $container):ConfigurationProviderInterface
    {
        $container->setConfigurators($this->environment);
        $configurators = $container->getConfigurators($this->environment);

        /** @var $configurator \JanKovacs\PhpAppConfig\Impl\AbstractConfigurator $configurator */
        foreach ($configurators as $configuratorClass)
        {
            $configurator = new $configuratorClass($this->environment);
            $this->mergeConfigurations($configurator->getConfigurations());
        }

        return new ConfigurationProvider($this->configurations);
    }

}