<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace Ergebnis\Example\Test\Unit\Entity;

use Ergebnis\Example\Entity;
use Ergebnis\Example\Test\Unit;

/**
 * @internal
 *
 * @covers \Ergebnis\Example\Entity\Avatar
 */
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
