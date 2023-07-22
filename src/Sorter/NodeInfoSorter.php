<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Sorter;

use Rector\PhpParserNodesDocs\ValueObject\NodeInfo;

final class NodeInfoSorter
{
    /**
     * @param NodeInfo[] $nodeInfos
     * @return NodeInfo[]
     */
    public function sortNodeInfosByClass(array $nodeInfos): array
    {
        usort($nodeInfos, fn (NodeInfo $firstNodeInfo, NodeInfo $secondNodeInfo): int => $firstNodeInfo->getClass() <=> $secondNodeInfo->getClass());

        return $nodeInfos;
    }
}
