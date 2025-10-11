<?php

declare(strict_types=1);

use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\Int_;

$variable = new Variable('variableName');
$dimension = new Int_(0);

return new ArrayDimFetch($variable, $dimension);
