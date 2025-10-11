<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\PropertyProperty;
use PhpParser\Node\VarLikeIdentifier;

$propertyProperty = new PropertyProperty(new VarLikeIdentifier('propertyName'));

return new Property(Modifiers::PUBLIC, [$propertyProperty]);
