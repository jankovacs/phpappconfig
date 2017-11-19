<?php

namespace JanKovacs\PhpAppConfig;

use ArrayObject;

interface ConfiguratorInterface
{

    /**
     * @param string $keyName
     * @param string $typeHint
     * @param mixed $value
     */
    public function create(string $keyName, string $typeHint, mixed $value):void;

    /**
     * @param string $keyName
     * @param mixed $value
     */
    public function setValue(string $keyName, mixed $value):void;

    /**
     * @return \ArrayObject
     */
    public function getConfigurations():ArrayObject;
}