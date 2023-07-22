<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\Command;

use Rector\PhpParserNodesDocs\NodeInfosFactory;
use Rector\PhpParserNodesDocs\Printer\MarkdownNodeInfosPrinter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class DumpNodesCommand extends Command
{
    /**
     * @var string
     */
    private const OUTPUT_FILE = 'output-file';

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

        $this->addOption(
            self::OUTPUT_FILE,
            null,
            InputOption::VALUE_REQUIRED,
            'Where to output the file',
            getcwd() . '/docs/nodes_overview.md'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $outputFile = (string) $input->getOption(self::OUTPUT_FILE);

        $nodeInfos = $this->nodeInfosFactory->create();
        $printedContent = $this->markdownNodeInfosPrinter->print($nodeInfos);

        file_put_contents($outputFile, $printedContent);

        $output->writeln(sprintf(
            'Documentation for "%d" PhpParser Nodes was generated to "%s"',
            count($nodeInfos),
            $outputFile
        ));

        return self::SUCCESS;
    }
}
