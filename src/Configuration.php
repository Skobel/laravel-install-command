<?php


namespace Skobel\LaravelInstallCommand;


abstract class Configuration
{
    abstract public function steps(): array;
}
