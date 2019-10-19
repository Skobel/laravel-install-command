<?php


namespace Skobel\LaravelInstallCommand\Steps;


use Illuminate\Support\Facades\Artisan;

class CreatePassportKeys extends Step
{

    /**
     * Execute this installation step
     */
    public function execute()
    {
        $this->info('Creating Passport keys.');

        Artisan::call('passport:keys');
    }
}
