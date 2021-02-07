<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs;

use PhpParser\Node;
use PhpParser\PrettyPrinter\Standard;
use Rector\PhpParserNodesDocs\Exception\ShouldNotHappenException;
use Rector\PhpParserNodesDocs\ValueObject\NodeCodeSample;
use Symplify\SmartFileSystem\Finder\SmartFinder;
use Symplify\SmartFileSystem\SmartFileInfo;

final class NodeCodeSampleProvider
{
    /**
     * @var SmartFinder
     */
    private $smartFinder;

    /**
     * @var Standard
     */
    private $standard;

    public function __construct(SmartFinder $smartFinder, Standard $standard)
    {
        $this->smartFinder = $smartFinder;
        $this->standard = $standard;
    }

    /**
     * @return array<class-string<Node>, array<int, NodeCodeSample>>
     */
    public function provide(): array
    {
        $snippetFileInfos = $this->smartFinder->find([__DIR__ . '/../snippet'], '*.php');

        $nodeCodeSamplesByNodeClass = [];

        foreach ($snippetFileInfos as $fileInfo) {
            $node = include $fileInfo->getRealPath();
            $this->ensureReturnsNodeObject($node, $fileInfo);

            $nodeClass = get_class($node);

            $printedContent = $this->standard->prettyPrint([$node]);
            $nodeCodeSamplesByNodeClass[$nodeClass][] = new NodeCodeSample(
                $fileInfo->getContents(),
                $printedContent
            );
        }

        ksort($nodeCodeSamplesByNodeClass);

        return $nodeCodeSamplesByNodeClass;
    }

    /**
     * @param mixed $node
     */
    private function ensureReturnsNodeObject($node, SmartFileInfo $fileInfo): void
    {
        if ($node instanceof Node) {
            return;
        }

        $message = sprintf('Snippet "%s" must return a node object', $fileInfo->getPathname());
        throw new ShouldNotHappenException($message);
    }
}
