<?php

namespace Skobel\LaravelInstallCommand;

use Illuminate\Support\ServiceProvider;
use Skobel\LaravelInstallCommand\Commands\InstallCommand;
use Skobel\LaravelInstallCommand\Commands\MakeStep\MakeStepCommand;
use Skobel\LaravelInstallCommand\Commands\Setup\SetupCommand;

class LaravelInstallCommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole())
        {
            $this->commands([
                InstallCommand::class,
                SetupCommand::class,
                MakeStepCommand::class,
            ]);
        }
    }
}
