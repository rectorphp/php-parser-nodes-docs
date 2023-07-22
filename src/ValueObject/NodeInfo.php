<?php

declare(strict_types=1);

namespace Rector\PhpParserNodesDocs\ValueObject;

use PhpParser\Node;
use ReflectionClass;

final class NodeInfo
{
    /**
     * @var string[]
     */
    private array $publicPropertyInfos = [];

    /**
     * @param class-string<Node> $class
     * @param NodeCodeSample[] $nodeCodeSamples
     */
    public function __construct(
        private readonly string $class,
        private readonly array $nodeCodeSamples = []
    ) {
        $reflectionClass = new ReflectionClass($class);
        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            if ($reflectionProperty->name === 'attributes') {
                continue;
            }

            $this->publicPropertyInfos[] = ' * `$' . $reflectionProperty->name . '` - `' . $reflectionProperty->getDocComment() . '`';
        }
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function hasPublicProperties(): bool
    {
        return $this->publicPropertyInfos !== [];
    }

    /**
     * @return string[]
     */
    public function getPublicPropertyInfos(): array
    {
        return $this->publicPropertyInfos;
    }

    /**
     * @return NodeCodeSample[]
     */
    public function getNodeCodeSamples(): array
    {
        return $this->nodeCodeSamples;
    }
}
