<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Command;

use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Rector\PhpParserNodesDocs\Printer\MarkdownNodeInfosPrinter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DumpNodesCommand extends Command
{
    public function __construct(
        private readonly MarkdownNodeInfosPrinter $markdownNodeInfosPrinter,
        private readonly NodeInfosFactory $nodeInfosFactory,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('dump-nodes');
        $this->setDescription('Dump nodes overview');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $nodeInfos = $this->nodeInfosFactory->create();
        $printedContent = $this->markdownNodeInfosPrinter->print($nodeInfos);

        file_put_contents(getcwd() . '/README.md', $printedContent);

        $output->write(PHP_EOL);

        $output->writeln(sprintf(
            '<info>Documentation for %d nodes was generated to README.md</info>' . PHP_EOL,
            count($nodeInfos),
        ));

        return self::SUCCESS;
    }
}
