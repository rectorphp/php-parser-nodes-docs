<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Tests;

use Rector\Core\HttpKernel\RectorKernel;
use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Symplify\PackageBuilder\Testing\AbstractKernelTestCase;

final class NodeInfosFactoryTest extends AbstractKernelTestCase
{
    /**
     * @var NodeInfosFactory
     */
    private $nodeInfosFactory;

    protected function setUp(): void
    {
        $this->bootKernel(RectorKernel::class);

        $this->nodeInfosFactory = $this->getService(NodeInfosFactory::class);
    }

    public function test(): void
    {
        $nodeInfos = $this->nodeInfosFactory->create();

        $nodeInfoCount = count($nodeInfos);
        $this->assertGreaterThan(50, $nodeInfoCount);
    }
}
