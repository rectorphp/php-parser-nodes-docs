<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs;

use Rector\PhpParserNodesDocs\Sorter\NodeInfoSorter;
use Rector\PhpParserNodesDocs\ValueObject\NodeInfo;

/**
 * @see \Rector\PhpParserNodesDocs\Tests\NodeInfosFactoryTest
 */
final class NodeInfosFactory
{
    /**
     * @var NodeCodeSampleProvider
     */
    private $nodeCodeSampleProvider;

    /**
     * @var NodeInfoSorter
     */
    private $nodeInfoSorter;

    public function __construct(NodeCodeSampleProvider $nodeCodeSampleProvider, NodeInfoSorter $nodeInfoSorter)
    {
        $this->nodeCodeSampleProvider = $nodeCodeSampleProvider;
        $this->nodeInfoSorter = $nodeInfoSorter;
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
