<?php


namespace JanKovacs\PhpAppConfig;


interface ConfigurationBuilderInterface
{

    /**
     * @param \JanKovacs\PhpAppConfig\ConfiguratorContainerInterface $container
     *
     * @return \JanKovacs\PhpAppConfig\ConfigurationProviderInterface
     */
    public function build(ConfiguratorContainerInterface $container):ConfigurationProviderInterface;
}