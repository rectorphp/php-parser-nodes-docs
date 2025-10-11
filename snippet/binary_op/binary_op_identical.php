<?php

declare(strict_types=1);

use PhpParser\Node\Expr\BinaryOp\Identical;
use PhpParser\Node\Scalar\Int_;

$left = new Int_(5);
$right = new Int_(10);

return new Identical($left, $right);
