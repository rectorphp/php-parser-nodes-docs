<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Tests;

use PHPUnit\Framework\TestCase;
use Rector\PhpParserNodesDocs\NodeCodeSampleProvider;
use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Rector\PhpParserNodesDocs\Sorter\NodeInfoSorter;

final class NodeInfosFactoryTest extends TestCase
{
    public function test(): void
    {
        $nodeInfosFactory = new NodeInfosFactory(new NodeCodeSampleProvider(), new NodeInfoSorter());

        $nodeInfos = $nodeInfosFactory->create();

        $nodeInfoCount = count($nodeInfos);
        $this->assertGreaterThan(78, $nodeInfoCount);
    }
}
