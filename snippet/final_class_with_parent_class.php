<?php

declare(strict_types=1);

use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;

$class = new Class_('ClassName');

$class->flags = \PhpParser\Modifiers::FINAL;
$class->extends = new FullyQualified('ParentClass');

return $class;
