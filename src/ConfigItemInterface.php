<?php

namespace JanKovacs\PhpAppConfig;


interface ConfigItemInterface
{
    /**
     * @api Sets a configuration value
     * @param mixed $value
     */
    public function setValue(mixed $value):void;
}