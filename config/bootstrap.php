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

use Symfony\Component\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv();

$dotenv->bootEnv(__DIR__ . '/../.env');
