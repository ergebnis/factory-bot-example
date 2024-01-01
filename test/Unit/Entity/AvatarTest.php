<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace App\Test\Unit\Entity;

use App\Entity;
use App\Test\Unit;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Entity\Avatar::class)]
final class AvatarTest extends Unit\AbstractTestCase
{
    public function testDefaults(): void
    {
        $avatar = new Entity\Avatar();

        self::assertSame(0, $avatar->height());
        self::assertSame('', $avatar->url());
        self::assertSame(0, $avatar->width());
    }
}
