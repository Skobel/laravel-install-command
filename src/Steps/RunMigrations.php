<?php

namespace Skobel\LaravelInstallCommand\Steps;


use Illuminate\Support\Facades\Artisan;

class RunMigrations extends Step
{

    /**
     * Execute this installation step
     */
    public function execute()
    {
        $this->info('Runnig migrations.');

        Artisan::call('migrate', ['--force' => true]);
    }
}
