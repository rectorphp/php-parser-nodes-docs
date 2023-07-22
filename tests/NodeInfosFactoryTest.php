<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Tests;

use PHPUnit\Framework\TestCase;
use Rector\PhpParserNodesDocs\DependencyInjection\ContainerFactory;
use Rector\PhpParserNodesDocs\NodeInfosFactory;

final class NodeInfosFactoryTest extends TestCase
{
    public function test(): void
    {
        $containerFactory = new ContainerFactory();
        $container = $containerFactory->create();

        /** @var NodeInfosFactory $nodeInfosFactory */
        $nodeInfosFactory = $container->make(NodeInfosFactory::class);

        $nodeInfos = $nodeInfosFactory->create();

        $nodeInfoCount = count($nodeInfos);
        $this->assertGreaterThan(50, $nodeInfoCount);
    }
}
