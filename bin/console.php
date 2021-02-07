<?php

// decoupled in own "*.php" file, so ECS, Rector and PHPStan works out of the box here

declare(strict_types=1);

use Symfony\Component\Console\Input\ArgvInput;
use Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun;

require_once __DIR__ . '/../vendor/autoload.php';

$kernelBootAndApplicationRun = new KernelBootAndApplicationRun(MonorepoBuilderKernel::class);
$kernelBootAndApplicationRun->run();