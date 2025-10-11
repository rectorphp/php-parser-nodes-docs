<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return RectorConfig::configure()
    ->withImportNames()
    ->withPaths([
        __DIR__ . '/snippet',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withPhpSets();
