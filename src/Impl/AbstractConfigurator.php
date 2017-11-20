<?php

namespace JanKovacs\PhpAppConfig\Impl;

use ArrayObject;
use Exception;
use JanKovacs\PhpAppConfig\ConfiguratorInterface;

abstract class AbstractConfigurator implements ConfiguratorInterface
{

    /** @var \ArrayObject */
    protected $configurations;

    /** @var string */
    protected $environment;

    /**
     * AbstractConfigurator constructor.
     *
     * @param string $environment
     */
    public function __construct(string $environment)
    {
        $this->environment = $environment;
        $this->configurations = new ArrayObject();
        $this->setConfigurations();
    }

    /**
     * @inheritdoc
     */
    abstract protected function setConfigurations():void;

    /**
     * @param string $keyName
     * @param string $typeHint
     * @param mixed $value
     *
     * @throws \Exception
     */
    protected function create(string $keyName, string $typeHint, mixed $value):void
    {
        if ($this->configurations->offsetExists($keyName))
        {
            throw new Exception('The configuration key '.$keyName.' already exists! Environment: '.$this->environment);
        }

        $configurationItem = new ConfigurationItem($keyName, $typeHint);
        $configurationItem->setValue($value);
        $this->configurations->offsetSet($keyName, $configurationItem);
    }

    /**
     * @param string $keyName
     * @param mixed $value
     */
    protected function set(string $keyName, mixed $value):void
    {
        if (!$this->configurations->offsetExists($keyName))
        {
            throw new Exception('The configuration key '.$keyName.' does not exists! Environment: '.$this->environment);
        }

        /** @var \JanKovacs\PhpAppConfig\ConfigurationItemInterface $configurationItem */
        $configurationItem = $this->configurations->offsetGet($keyName);
        if ($configurationItem->getValue() !== null && $configurationItem->getEnvironment() === $this->environment)
        {
            throw new Exception('The value has been set already for the key '.$keyName.' and environment: '.$this->environment);
        }

        $configurationItem->setEnvironment($this->environment);
        $configurationItem->setValue($value);
    }

    /**
     * @return \ArrayObject
     */
    public function getConfigurations():ArrayObject
    {
        return $this->configurations;
    }

}