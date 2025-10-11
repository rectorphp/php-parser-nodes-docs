<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Stmt\ClassMethod;

$classMethod = new ClassMethod('methodName');
$classMethod->flags = Modifiers::PUBLIC;

return $classMethod;
