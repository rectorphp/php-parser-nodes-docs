<?php

declare(strict_types=1);

use PhpParser\PrettyPrinter\Standard;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SmartFileSystem\Finder\SmartFinder;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->public()
        ->autowire()
        ->autoconfigure();

    $services->load('Rector\PhpParserNodesDocs\\', __DIR__ . '/../src')
        ->exclude([__DIR__ . '/../src/ValueObject', __DIR__ . '/../src/HttpKernel']);

    $services->set(SmartFinder::class);
    $services->set(Standard::class);
};
