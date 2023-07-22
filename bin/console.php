<?php

declare(strict_types=1);

use Rector\PhpParserNodesDocs\DependencyInjection\ContainerFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

require_once __DIR__ . '/../vendor/autoload.php';

$containerFactory = new ContainerFactory();
$container = $containerFactory->create();

/** @var Application $application */
$application = $container->make(Application::class);

$input = new ArgvInput();
$output = new ConsoleOutput();

$exitCode = $application->run($input, $output);
exit($exitCode);
