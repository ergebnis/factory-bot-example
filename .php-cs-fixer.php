<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

use Ergebnis\License;
use Ergebnis\PhpCsFixer;

$license = License\Type\MIT::markdown(
    __DIR__ . '/LICENSE.md',
    License\Range::since(
        License\Year::fromString('2020'),
        new \DateTimeZone('UTC'),
    ),
    License\Holder::fromString('Andreas Möller'),
    License\Url::fromString('https://github.com/ergebnis/factory-bot-example'),
);

$license->save();

$ruleSet = PhpCsFixer\Config\RuleSet\Php83::create()->withHeader($license->header());

$config = PhpCsFixer\Config\Factory::fromRuleSet($ruleSet);

$config->getFinder()
    ->exclude([
        '.build/',
        '.github/',
        '.note/',
        'var/',
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->name([
        '.php-cs-fixer.php',
        'console',
    ])
    ->notName([
        '.env.local.php',
    ]);

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php-cs-fixer.cache');

return $config;
