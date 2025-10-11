<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\PropertyProperty;

$propertyProperties = [new PropertyProperty('firstProperty'), new PropertyProperty('secondProperty')];

return new Property(Modifiers::STATIC | Modifiers::PUBLIC, $propertyProperties);
