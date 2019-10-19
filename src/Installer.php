<?php

namespace Skobel\LaravelInstallCommand;


class Installer
{
    /**
     * @var Configuration
     */
    private static $configuration;

    /**
     * Run the installation steps
     * @throws \Throwable
     */
    public static function run()
    {
        throw_unless(
            self::$configuration instanceof Configuration,
            new \Exception('The Installer class requires a valid configuration in order to run.')
        );

        /*
        app(Pipeline::class)
            ->through(self::$configuration->steps())
            ->via('execute')
            ->thenReturn();
        */
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
