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
    public function __construct(
        private readonly Standard $standard,
        private readonly PhpFilesFinder $phpFilesFinder,
    ) {
    }

    /**
     * @return array<class-string<Node>, array<int, NodeCodeSample>>
     */
    public function provide(): array
    {
        $phpFilePaths = $this->phpFilesFinder->findPhpFiles([__DIR__ . '/../snippet']);

        $nodeCodeSamplesByNodeClass = [];

        foreach ($phpFilePaths as $phpFilePath) {
            /** @var Node $node */
            $node = include $phpFilePath;

            /** @var string $fileContents */
            $fileContents = file_get_contents($phpFilePath);

            Assert::isInstanceOf($node, Node::class, $phpFilePath);

            $nodeClass = $node::class;

            $printedContent = $this->standard->prettyPrint([$node]);

            $nodeCodeSamplesByNodeClass[$nodeClass][] = new NodeCodeSample(
                $fileContents,
                $printedContent
            );
        }

        ksort($nodeCodeSamplesByNodeClass);

        return $nodeCodeSamplesByNodeClass;
    }
}
