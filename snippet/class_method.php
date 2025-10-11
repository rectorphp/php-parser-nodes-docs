<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\ClassMethod;

$classMethod = new ClassMethod('methodName');
$classMethod->flags = \PhpParser\Modifiers::PUBLIC;

return $classMethod;
