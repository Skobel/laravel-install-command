<?php

namespace Skobel\LaravelInstallCommand\Commands\Setup;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installer:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create some stubs to quickly get started with the installer.';

    /**
     * @var Filesystem
     */
    private $files;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->files->isDirectory(app_path('Installation')))
            return $this->error('The Installation directory already exists.');

        $this->files->makeDirectory(app_path('Installation/Steps'), 0755, true);

        // Create Configuration.php file
        $this->files->put(app_path('Installation/Configuration.php'), file_get_contents(__DIR__.'/Stubs/Configuration.php.stub'));

        $this->info('✅ Setup finished.');
    }
}
