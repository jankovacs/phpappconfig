<?php

namespace JanKovacs\PhpAppConfig\Impl;

use ArrayObject;
use Exception;
use JanKovacs\PhpAppConfig\ConfigurationProviderInterface;

class ConfigurationProvider implements ConfigurationProviderInterface
{

    /** @var \ArrayObject */
    protected $configurations;

    /**
     * ConfigurationProvider constructor.
     *
     * @param \ArrayObject $configurations
     */
    public function __construct(ArrayObject $configurations)
    {
        $this->configurations = $configurations;
    }

    /**
     * @inheritdoc
     */
    public function get(string $keyName)
    {
        if ($this->configurations->offsetExists($keyName))
        {
            return $this->configurations->offsetGet($keyName);
        }

        throw new Exception('The configuration key '.$keyName.' does not exist!');
    }
}