<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\ValueObject;

final class NodeCodeSample
{
    private readonly string $phpCode;

    private readonly string $printedContent;

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
