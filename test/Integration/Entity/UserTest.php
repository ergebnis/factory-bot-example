<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace Ergebnis\Example\Test\Integration\Entity;

use Ergebnis\Example\Entity;
use Ergebnis\Example\Repository;
use Ergebnis\Example\Test;

/**
 * @internal
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
