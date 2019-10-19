<?php

namespace Skobel\LaravelInstallCommand;

use Illuminate\Support\ServiceProvider;
use Skobel\LaravelInstallCommand\Commands\InstallCommand;

class LaravelInstallCommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole())
        {
            $this->commands([
                InstallCommand::class
            ]);
        }
    }
}
