<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\DependencyInjection;

use Illuminate\Container\Container;
use Rector\PhpParserNodesDocs\Command\DumpNodesCommand;
use Symfony\Component\Console\Application;

final class ContainerFactory
{
    public function create(): Container
    {
        $container = new Container();

        $container->singleton(Application::class, function (Container $container) {
            $application = new Application();

            /** @var DumpNodesCommand $dumpNodesCommand */
            $dumpNodesCommand = $container->make(DumpNodesCommand::class);
            $application->add($dumpNodesCommand);

            return $application;
        });

        return $container;
    }
}
