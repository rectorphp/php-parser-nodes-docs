<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\ValueObject;

final readonly class NodeCodeSample
{
    private string $phpCode;

    private string $printedContent;

    public function __construct(string $phpCode, string $printedContent)
    {
        $this->phpCode = trim($phpCode);
        $this->printedContent = trim($printedContent);
    }

    public function getPhpCode(): string
    {
        return $this->phpCode;
    }

    public function getPrintedContent(): string
    {
        return $this->printedContent;
    }
}
