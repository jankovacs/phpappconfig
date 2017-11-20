<?php

namespace JanKovacs\PhpAppConfig;


interface ConfiguratorContainerInterface
{

    /**
     * @param string $environment
     *
     * @return string[]
     */
    public function getConfigurators(string $environment):array;

    /**
     * @param string $environment
     */
    public function setConfigurators(string $environment):void;
}