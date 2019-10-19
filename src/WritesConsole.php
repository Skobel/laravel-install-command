<?php


namespace Skobel\LaravelInstallCommand;


use Symfony\Component\Console\Output\ConsoleOutput;

trait WritesConsole
{
    /**
     * Write an error line to the console
     *
     * @param  string  $string
     * @return void
     */
    public function error($string)
    {
        $this->line($string, 'error');
    }

    /**
     * Write a comment line to the console
     *
     * @param  string  $string
     * @return void
     */
    public function comment($string)
    {
        $this->line($string, 'comment');
    }

    /**
     * Write a line to the console
     *
     * @param  string  $string
     * @param  string|null  $style
     * @return void
     */
    public function line($string, $style = null)
    {
        $output = resolve(ConsoleOutput::class);

        $output->writeln(
            $style ? "<$style>$string</$style>" : $string
        );
    }

    /**
     * Write an information line to the console
     *
     * @param  string  $string
     * @return void
     */
    public function info($string)
    {
        $this->line($string, 'info');
    }
}
