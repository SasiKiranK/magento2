<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Developer\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DevTestsRunCommand
 *
 * Runs tests (unit, static, integration, etc.)
 */
class DevProfilerStatus extends Command
{
    /**
     * input parameter parameter
     */
    const INPUT_ARG_TYPE = 'type';

    /**
     * command name
     */
    const COMMAND_NAME = 'dev:profiler:status';
    const NAME_ARGUMENT = "Test";

    /**
     * Maps types (from user input) to phpunit test names
     *
     * @var array
     */
    private $types;

    /**
     * Maps phpunit test names to directory and target name
     *
     * @var array
     */
    private $commands;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        // $this->setupTestInfo();
        $this->setName(self::COMMAND_NAME)
            ->setDescription('Profile Status');

        $this->addArgument(
            self::NAME_ARGUMENT
        );

        parent::configure();
    }

    /**
     * Run the tests
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int Non zero if invalid type, 0 otherwise
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $name = $input->getArgument(self::NAME_ARGUMENT);
        // $allowAnonymous = $input->getOption(self::ALLOW_ANONYMOUS);
        // if (is_null($name)) {
        //     if ($allowAnonymous) {
        //         $name = self::ANONYMOUS_NAME;
        //     } else {
        //         throw new \InvalidArgumentException('Argument ' . self::NAME_ARGUMENT . ' is missing.');
        //     }
        // }
        $output->writeln('<info>Hello ' . $name . '!</info>');
    }

}
