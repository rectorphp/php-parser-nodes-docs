<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/config',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $ecsConfig->sets([
        SetList::STRICT,
        SetList::COMMON,
        SetList::PSR_12,
    ]);
};
