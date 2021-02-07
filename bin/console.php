<?php

// decoupled in own "*.php" file, so ECS, Rector and PHPStan works out of the box here

declare(strict_types=1);

use Rector\PhpParserNodesDocs\HttpKernel\PhpParserNodesDocsKernel;
use Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun;

require_once __DIR__ . '/../vendor/autoload.php';

$kernelBootAndApplicationRun = new KernelBootAndApplicationRun(PhpParserNodesDocsKernel::class);
$kernelBootAndApplicationRun->run();
