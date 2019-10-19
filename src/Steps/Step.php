<?php

namespace Skobel\LaravelInstallCommand\Steps;


use Skobel\LaravelInstallCommand\WritesConsole;

abstract class Step
{
    use WritesConsole;

    /**
     * Execute this installation step
     */
    abstract public function execute();

}
