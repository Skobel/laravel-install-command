<?php


namespace Skobel\LaravelInstallCommand\Steps;


use Illuminate\Support\Facades\Artisan;

class GenerateApplicationKey extends Step
{

    /**
     * Execute this installation step
     */
    public function execute()
    {
        $this->info('Generating application encryption key.');
        Artisan::call('key:generate');
    }
}
