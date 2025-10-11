<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Const_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassConst;

$defaultValue = new String_('default value');
$const = new Const_('SOME_CLASS_CONSTANT', $defaultValue);

return new ClassConst([$const], Modifiers::PUBLIC);
