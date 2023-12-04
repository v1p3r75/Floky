<?php

namespace App\Console\Commands;

use Floky\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'hello', // exemple
    description: 'say hello to people',
)]
class SayHelloCommand extends Command
{

    protected function configure()
    {

        /* Exemple
        * $this
        * ->addArgument('name', InputArgument::REQUIRED, 'The name of argument');
        */
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $output->writeln("Welcome to Hello command.");
        return Command::SUCCESS;
    }
}