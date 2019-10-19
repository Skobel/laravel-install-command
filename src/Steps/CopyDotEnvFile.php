<?php

namespace Skobel\LaravelInstallCommand\Steps;

class CopyDotEnvFile extends Step
{
    public function execute()
    {
        $this->info('Creating .env file using the contents of .env.example.');

        if(file_exists(base_path('.env')))
            return $this->error('The .env file already exists.');

        if(! file_exists(base_path('.env.example')))
            return $this->error('There is no .env.example file to copy from.');

        copy(base_path('.env.example'), base_path('.env'));
    }
}
