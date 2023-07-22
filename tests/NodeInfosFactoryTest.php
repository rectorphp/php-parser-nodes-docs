<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Tests;

use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Symplify\PackageBuilder\Testing\AbstractKernelTestCase;

final class NodeInfosFactoryTest extends AbstractKernelTestCase
{
    protected function setUp(): void
    {
        $this->nodeInfosFactory = $this->getService(NodeInfosFactory::class);
    }

    public function test(): void
    {
        $nodeInfos = $this->nodeInfosFactory->create();

        $nodeInfoCount = count($nodeInfos);
        $this->assertGreaterThan(50, $nodeInfoCount);
    }
}
