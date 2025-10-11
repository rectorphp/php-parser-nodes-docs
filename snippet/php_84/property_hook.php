<?php

declare(strict_types=1);

use PhpParser\Modifiers;

$propertyItem = new \PhpParser\Node\PropertyItem('someProperty');
$property = new \PhpParser\Node\Stmt\Property(Modifiers::PUBLIC, [$propertyItem]);

$plus = new \PhpParser\Node\Expr\BinaryOp\Plus(
    new \PhpParser\Node\Expr\Variable('variable'),
    new \PhpParser\Node\Scalar\Int_(100)
);

$getPropertyHook = new \PhpParser\Node\PropertyHook('getProperty', $plus);

$property->hooks[] = $getPropertyHook;

return $property;
