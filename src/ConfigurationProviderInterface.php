<?php

namespace JanKovacs\PhpAppConfig;


interface ConfigurationProviderInterface
{

    /**
     * @api Returns back the already set configuration setting
     *
     * @param string $keyName
     *
     * @return mixed
     */
    public function get(string $keyName):mixed;
}