<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Finder;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Webmozart\Assert\Assert;

final class PhpFilesFinder
{
    /**
     * @param string[] $paths
     * @return SplFileInfo[]
     */
    public static function find(array $paths): array
    {
        Assert::allString($paths);

        $finder = Finder::create()
            ->name('*.php')
            ->sortByName()
            ->in($paths);

        return iterator_to_array($finder->getIterator());
    }
}
