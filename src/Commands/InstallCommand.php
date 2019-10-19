<?php

namespace Skobel\LaravelInstallCommand\Commands;

use Illuminate\Console\Command;
use Skobel\LaravelInstallCommand\Installer;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('⏳ Begin application installation...');

        Installer::run();

        $this->info('✅ Installation finished.');
    }
}
