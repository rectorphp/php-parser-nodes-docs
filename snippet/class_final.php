<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Stmt\Class_;

$class = new Class_('ClassName');
$class->flags |= Modifiers::FINAL;

return $class;
