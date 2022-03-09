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
 * @covers \Ergebnis\Example\Entity\CodeOfConduct
 */
final class CodeOfConductTest extends Unit\AbstractTestCase
{
    public function testConstructorSetsValues(): void
    {
        $faker = self::faker();

        $key = $faker->word;
        $name = $faker->sentence;
        $url = $faker->url;
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
