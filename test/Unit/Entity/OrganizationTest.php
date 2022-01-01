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
 * @covers \Ergebnis\Example\Entity\Organization
 */
final class OrganizationTest extends Unit\AbstractTestCase
{
    public function testDefaults(): void
    {
        $name = self::faker()->userName;

        $organization = new Entity\Organization($name);

        self::assertTrue($organization->constructorWasCalled());
        self::assertStringIsUuid($organization->id());
        self::assertFalse($organization->isVerified());
        self::assertEmpty($organization->members());
        self::assertEmpty($organization->repositories());
        self::assertNull($organization->url());
    }

    public function testConstructorSetsValues(): void
    {
        $name = self::faker()->userName;

        $organization = new Entity\Organization($name);

        self::assertSame($name, $organization->name());
    }

    public function testRenameToRenamesOrganization(): void
    {
        $faker = self::faker()->unique();

        $name = $faker->userName;
        $newName = $faker->userName;

        $organization = new Entity\Organization($name);

        $organization->renameTo($newName);

        self::assertSame($newName, $organization->name());
    }
}
