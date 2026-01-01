<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace App;

use Symfony\Bundle\FrameworkBundle;
use Symfony\Component\HttpKernel;

final class Kernel extends HttpKernel\Kernel
{
    use FrameworkBundle\Kernel\MicroKernelTrait;
}
