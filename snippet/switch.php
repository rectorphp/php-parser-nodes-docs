<?php

declare(strict_types=1);

use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\Case_;
use PhpParser\Node\Stmt\Switch_;

$cond = new Variable('variableName');
$cases = [new Case_(new Int_(1))];

return new Switch_($cond, $cases);
