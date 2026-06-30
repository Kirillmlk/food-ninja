<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/routes',
    ])
    ->withSets([
        LevelSetList::UP_TO_PHP_83,
        SetList::CODE_QUALITY,
        LaravelSetList::LARAVEL_110,
    ])
    ->withSkip([
        __DIR__ . '/database/migrations',
    ]);
