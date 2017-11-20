<?php

namespace JanKovacs\PhpAppConfig;


interface ConfigurationItemInterface
{
    /**
     * @api Gets a configuration value
     * @return  mixed
     */
    public function getValue():mixed;

    /**
     * @api Sets a configuration value
     * @param mixed $value
     */
    public function setValue(mixed $value):void;

    /**
     * @api Gets the environment
     * @return string
     */
    public function getEnvironment():string;


    /**
     * @api Sets the environment value
     * @param string $environment
     */
    public function setEnvironment(string $environment):void;


}