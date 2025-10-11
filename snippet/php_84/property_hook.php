<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Expr\BinaryOp\Plus;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\PropertyHook;
use PhpParser\Node\PropertyItem;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\Property;

$propertyItem = new PropertyItem('someProperty');
$property = new Property(Modifiers::PUBLIC, [$propertyItem]);

$plus = new Plus(new Variable('variable'), new Int_(100));

$getPropertyHook = new PropertyHook('getProperty', $plus);

$property->hooks[] = $getPropertyHook;

return $property;
