<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\PropertyProperty;

$class = new Class_(new Identifier('ClassName'));

$propertyProperty = new PropertyProperty('someProperty');
$property = new Property(Modifiers::PRIVATE, [$propertyProperty]);

$class->stmts[] = $property;

return $class;
