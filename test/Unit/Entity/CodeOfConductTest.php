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

namespace App\Test\Unit\Entity;

use App\Entity;
use App\Test\Unit;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Entity\CodeOfConduct::class)]
final class CodeOfConductTest extends Unit\AbstractTestCase
{
    public function testConstructorSetsValues(): void
    {
        $faker = self::faker();

        $key = $faker->word();
        $name = $faker->sentence();
        $url = $faker->url();
        $body = $faker->realText();

        $codeOfConduct = new Entity\CodeOfConduct(
            $key,
            $name,
            $url,
            $body,
        );

        self::assertSame($body, $codeOfConduct->body());
        self::assertSame($key, $codeOfConduct->key());
        self::assertSame($name, $codeOfConduct->name());
        self::assertSame($url, $codeOfConduct->url());
    }
}
