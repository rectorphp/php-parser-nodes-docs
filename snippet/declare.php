<?php

declare(strict_types=1);

use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\DeclareDeclare;

$declareDeclare = new DeclareDeclare('strict_types', new Int_(1));

return new Declare_([$declareDeclare]);
