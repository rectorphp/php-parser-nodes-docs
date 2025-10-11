<?php

declare(strict_types=1);

use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\Block;
use PhpParser\Node\Stmt\Expression;

$assign = new Assign(new Variable('someValue'), new Int_(10000));

return new Block([new Expression($assign)]);
