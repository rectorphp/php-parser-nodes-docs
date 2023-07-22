<?php

declare(strict_types=1);

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;

$variable = new Variable('someObject');

$args = [];
$args[] = new Arg(new String_('yes'));

$methodCall = new MethodCall($variable, 'methodName', $args);

$nestedMethodCall = new MethodCall($methodCall, 'nextMethodName');

return $nestedMethodCall;
