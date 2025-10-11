<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;

$classMethod = new ClassMethod('methodName');
$classMethod->flags = Modifiers::PUBLIC;

$variable = new Variable('some');
$number = new Int_(10000);
$assign = new Assign($variable, $number);

$classMethod->stmts[] = new Expression($assign);

return $classMethod;
