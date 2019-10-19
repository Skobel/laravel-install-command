<?php

namespace Skobel\LaravelInstallCommand;


class Installer
{
    /**
     * @var Configuration
     */
    private static $configuration = null;

    private static $defaultConfigurationClass = 'App\\Installation\\Configuration';

    /**
     * Run the installation steps
     * @throws \Throwable
     */
    public static function run()
    {
        if(is_null(self::$configuration))
        {
            if(class_exists(self::$defaultConfigurationClass))
                self::$configuration = new self::$defaultConfigurationClass;
        }

        throw_unless(
            self::$configuration instanceof Configuration,
            new \Exception('The Installer configuration must be an instance of '. Configuration::class)
        );

        collect(self::$configuration->steps())->each->execute();
    }

    /**
     * Use the given configuration
     * @param Configuration $configuration
     */
    public static function use(Configuration $configuration)
    {
        self::$configuration = $configuration;
    }
}
