<?php

namespace Skobel\LaravelInstallCommand\Commands\MakeStep;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeStepCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installer:step {step}';

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
        $step = $this->argument('step');

        // Create directory if it does not exist
        if(! $this->files->isDirectory(app_path('Installation/steps')))
            $this->files->makeDirectory(app_path('Installation/Steps'), 0755, true);

        // Check if the given step is already exist
        if($this->files->isFile(app_path("Installation/Steps/{$step}.php")))
            return $this->error('A step with the given name is already exists.');

        $content = file_get_contents(__DIR__.'/Stubs/Step.stub');
        $content = str_replace('$NAME$', $step, $content);

        // Create Configuration.php file
        $this->files->put(app_path('Installation/Steps/'. $step .'.php'), $content);

        $this->info('✅ Step created.');
    }
}
