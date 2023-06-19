<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace App\Test\Integration\Entity;

use App\Entity;
use App\Repository;
use App\Test;

/**
 * @internal
 *
 * @coversNothing
 */
final class UserTest extends Test\Integration\AbstractTestCase
{
    public function testHasCustomRepository(): void
    {
        $repository = self::entityManager()->getRepository(Entity\User::class);

        self::assertInstanceOf(Repository\UserRepository::class, $repository);
    }
}
