<?php

namespace JanKovacs\PhpAppConfig\Impl;

use JanKovacs\PhpAppConfig\ConfigurationItemInterface;
use TypeError;

class ConfigurationItem implements ConfigurationItemInterface
{
    /** @var string */
    protected $keyName;

    /** @var string */
    protected $typeHint;

    /** @var string */
    protected $environment;

    /** @var mixed */
    protected $value;

    /**
     * ConfigurationItem constructor.
     *
     * @param string $keyName
     * @param string $typeHint
     * @param string $environment
     */
    public function __construct(string $keyName, string $typeHint, string $environment = '')
    {
        $this->keyName = $keyName;
        $this->typeHint = $typeHint;
        $this->environment = $environment;
    }

    /**
     * @inheritdoc
     */
    public function setValue(mixed $value):void
    {
        $type = gettype($value);
        if ($type !== $this->typeHint) {
            throw new TypeError('Expected to set a value with type of '.$this->typeHint.', but got '.$type);
        }

        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }
}