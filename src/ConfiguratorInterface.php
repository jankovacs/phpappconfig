<?php

namespace JanKovacs\PhpAppConfig;

use ArrayObject;

interface ConfiguratorInterface
{


    /**
     * @return \ArrayObject
     */
    public function getConfigurations():ArrayObject;
}