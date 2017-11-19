<?php

namespace JanKovacs\PhpAppConfig;

use ArrayObject;

interface ConfiguratorInterface
{
    /**
     * @api sets the needed configurations
     */

    public function setConfigurations():void;

    /**
     * @return \ArrayObject
     */
    public function getConfigurations():ArrayObject;
}