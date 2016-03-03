<?php

namespace Medz\Component\Installer\ThinkSNS\Console;

use RuntimeException;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * 新建一个ThinkSNS-4
 *
 * @package Medz\Component\Installer\ThinkSNS\Console\NewCommand
 * @author Seven Du <lovevipdsw@outlook.com>
 **/
class NewCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('new')
            ->setDescription('Create a new ThinkSNS project.')
            ->addArgument('name', InputArgument::REQUIRED)
            ->addArgument('version', InputArgument::OPTIONAL);
    }

    /**
     * Execute the command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface  $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dir     = $input->getArgument('name');
        $version = $input->getArgument('version');

        $dir     = str_replace('/', DIRECTORY_SEPARATOR, $dir);
        $dir     = str_replace('\\', DIRECTORY_SEPARATOR, $dir);

        if (file_exists($dir . '/composer.lock')) {
            throw new RuntimeException('ThinkSNS-4 already exists!');
        }

        $output->writeln('<info>Crafting ThinkSNS-4...</info>');

        $composer = $this->findComposer();

        $commands = array(
            sprintf(
                '%s create-project %s %s%s --prefer-dist',
                $composer,
                'medz/thinksns-4',
                $dir,
                $version
                    ? sprintf(' %s', $version)
                    : ''
            )
        );

        mkdir($dir, 0777, true);

        $process = new Process(implode(' && ', $commands), getcwd(), null, null, null);

        $process->run(
            function ($type, $line) use ($output)
            {
                $output->write($line);
            }
        );

        $output->writeln('<comment>ThinkSNS-4 ready! Build something amazing.</comment>');
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY.  '" composer.phar';
        }

        return 'composer';
    }

} // END class NewCommand extends Command
