<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs;

use Rector\PhpParserNodesDocs\Sorter\NodeInfoSorter;
use Rector\PhpParserNodesDocs\ValueObject\NodeInfo;

/**
 * @see \Rector\PhpParserNodesDocs\Tests\NodeInfosFactoryTest
 */
final readonly class NodeInfosFactory
{
    public function __construct(
        private NodeCodeSampleProvider $nodeCodeSampleProvider,
        private NodeInfoSorter $nodeInfoSorter
    ) {
    }

    /**
     * @return NodeInfo[]
     */
    public function create(): array
    {
        $nodeInfos = [];
        foreach ($this->nodeCodeSampleProvider->provide() as $nodeClass => $nodeCodeSamples) {
            $nodeInfos[] = new NodeInfo($nodeClass, $nodeCodeSamples);
        }

        return $this->nodeInfoSorter->sortNodeInfosByClass($nodeInfos);
    }
}
