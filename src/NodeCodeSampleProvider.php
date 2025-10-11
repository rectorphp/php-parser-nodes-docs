<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs;

use PhpParser\Node;
use PhpParser\PrettyPrinter\Standard;
use Rector\PhpParserNodesDocs\Finder\PhpFilesFinder;
use Rector\PhpParserNodesDocs\ValueObject\NodeCodeSample;
use Webmozart\Assert\Assert;

final class NodeCodeSampleProvider
{
    private Standard $standardPrinter;

    public function __construct(
    ) {
        $this->standardPrinter = new Standard();
    }

    /**
     * @return array<class-string<Node>, array<int, NodeCodeSample>>
     */
    public function provide(): array
    {
        $phpFileInfos = PhpFilesFinder::find([__DIR__ . '/../snippet']);

        $nodeCodeSamplesByNodeClass = [];

        foreach ($phpFileInfos as $phpFileInfo) {
            /** @var Node $node */
            $node = include $phpFileInfo->getRealPath();

            $errorMessage = sprintf('The "%s" file must return "%s" instance ', $phpFileInfo, Node::class);
            Assert::isInstanceOf($node, Node::class, $errorMessage);

            /** @var string $fileContents */
            $fileContents = $phpFileInfo->getContents();

            $nodeClass = $node::class;

            $printedContent = $this->standardPrinter->prettyPrint([$node]);

            $nodeCodeSamplesByNodeClass[$nodeClass][] = new NodeCodeSample($fileContents, $printedContent);
        }

        ksort($nodeCodeSamplesByNodeClass);

        return $nodeCodeSamplesByNodeClass;
    }
}
