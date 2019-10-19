<?php

namespace Skobel\LaravelInstallCommand\Steps;


use Illuminate\Support\Facades\Artisan;

class SeedDatabase extends Step
{

    /**
     * Execute this installation step
     */
    public function execute()
    {
        $this->info('Seeding the database.');

        Artisan::call('db:seed', ['--force' => true]);
    }
}
