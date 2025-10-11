<?php

declare(strict_types=1);

use Rector\PhpParserNodesDocs\NodeCodeSampleProvider;
use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Rector\PhpParserNodesDocs\Printer\MarkdownNodeInfosPrinter;
use Rector\PhpParserNodesDocs\Sorter\NodeInfoSorter;

require_once __DIR__ . '/../vendor/autoload.php';

$markdownNodeInfosPrinter = new MarkdownNodeInfosPrinter();

$nodeInfosFactory = new NodeInfosFactory(new NodeCodeSampleProvider(), new NodeInfoSorter());

$nodeInfos = $nodeInfosFactory->create();
$printedContent = $markdownNodeInfosPrinter->print($nodeInfos);

file_put_contents(getcwd() . '/README.md', $printedContent);

echo sprintf('Documentation for %d nodes was generated to README.md' . PHP_EOL . PHP_EOL, count($nodeInfos));

// success
exit(0);
