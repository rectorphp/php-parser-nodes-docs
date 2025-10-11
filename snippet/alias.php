<?php

declare(strict_types=1);

use PhpParser\Modifiers;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

$traitFullyQualified = new FullyQualified('TraitName');

return new Alias($traitFullyQualified, 'method', Modifiers::PUBLIC, 'aliasedMethod');
