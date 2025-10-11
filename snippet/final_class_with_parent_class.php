<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;

$class = new Class_('ClassName');

$class->flags = Modifiers::FINAL;
$class->extends = new FullyQualified('ParentClass');

return $class;
