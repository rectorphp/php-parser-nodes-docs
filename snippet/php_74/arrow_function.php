<?php

declare(strict_types=1);

use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Scalar\Int_;

$subNodes['expr'] = new Int_(1);

return new ArrowFunction($subNodes);
