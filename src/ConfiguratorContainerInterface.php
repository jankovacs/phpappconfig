<?php

namespace JanKovacs\PhpAppConfig;


interface ConfiguratorContainerInterface
{

    /**
     * @param string $environment
     *
     * @return \JanKovacs\PhpAppConfig\ConfiguratorInterface[]
     */
    public function getConfigurators(string $environment):array;

    /**
     * @param string $environment
     */
    public function setConfigurators(string $environment):void;
}