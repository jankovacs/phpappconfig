<?php

namespace JanKovacs\PhpAppConfig\Impl;

use ArrayObject;
use Exception;
use JanKovacs\PhpAppConfig\ConfiguratorInterface;
use JanKovacs\PhpAppConfig\Impl\ConfigurationItem;

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
    }

    /**
     * @param string $keyName
     * @param string $typeHint
     * @param mixed $value
     *
     * @throws \Exception
     */
    public function create(string $keyName, string $typeHint, mixed $value):void
    {
        if ($this->configurations->offsetExists($keyName))
        {
            throw new Exception('The configuration key '.$keyName.' already exists! Environment: '.$this->environment);
        }

        $configurationItem = new ConfigurationItem($keyName, $typeHint, $this->environment);
        $configurationItem->setValue($value);
        $this->configurations->offsetSet($keyName, $configurationItem);
    }

    /**
     * @param string $keyName
     * @param mixed $value
     */
    abstract public function setValue(string $keyName, mixed $value):void;

    /**
     * @return \ArrayObject
     */
    public function getConfigurations():ArrayObject
    {
        return $this->configurations;
    }

}