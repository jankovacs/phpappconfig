<?php

namespace JanKovacs\PhpAppConfig\Impl;

use JanKovacs\PhpAppConfig\ConfigItemInterface;
use TypeError;

class ConfigurationItem implements ConfigItemInterface
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
     */
    public function __construct(string $keyName, string $typeHint, string $environment)
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
}