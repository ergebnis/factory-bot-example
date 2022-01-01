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
 * @covers \Ergebnis\Example\Entity\User
 */
final class UserTest extends Unit\AbstractTestCase
{
    public function testDefaults(): void
    {
        $faker = self::faker();

        $login = $faker->userName;
        $avatar = new Entity\Avatar();

        $user = new Entity\User(
            $login,
            $avatar
        );

        self::assertStringIsUuid($user->id());
        self::assertNull($user->location());
        self::assertEmpty($user->organizations());
    }

    public function testConstructorSetsValues(): void
    {
        $faker = self::faker();

        $login = $faker->userName;
        $avatar = new Entity\Avatar();
        $location = $faker->city;

        $user = new Entity\User(
            $login,
            $avatar,
            $location
        );

        self::assertSame($login, $user->login());
        self::assertSame($avatar, $user->avatar());
        self::assertSame($location, $user->location());
    }

    public function testRenameToRenamesUser(): void
    {
        $login = self::faker()->userName;

        /** @var Entity\User $user */
        $user = self::fixtureFactory()->createOne(Entity\User::class);

        $user->renameTo($login);

        self::assertSame($login, $user->login());
    }
}
