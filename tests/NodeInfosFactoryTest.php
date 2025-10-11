<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Tests;

use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\TestCase;
use Rector\PhpParserNodesDocs\Finder\PhpFilesFinder;
use Rector\PhpParserNodesDocs\NodeCodeSampleProvider;
use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Rector\PhpParserNodesDocs\Sorter\NodeInfoSorter;

final class NodeInfosFactoryTest extends TestCase
{
    public function test(): void
    {
        $nodeInfosFactory = new NodeInfosFactory(
            new NodeCodeSampleProvider(new Standard(), new PhpFilesFinder()),
            new NodeInfoSorter()
        );

        $nodeInfos = $nodeInfosFactory->create();

        $nodeInfoCount = count($nodeInfos);
        $this->assertGreaterThan(78, $nodeInfoCount);
    }
}
