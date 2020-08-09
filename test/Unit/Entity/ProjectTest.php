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

namespace Ergebnis\Example\Test\Unit\Entity;

use Ergebnis\Example\Entity;
use Ergebnis\Example\Test\Unit;

/**
 * @internal
 *
 * @covers \Ergebnis\Example\Entity\Project
 */
final class ProjectTest extends Unit\AbstractTestCase
{
    public function testConstructorSetsValues(): void
    {
        $name = self::faker()->userName;

        $fixtureFactory = self::fixtureFactory();

        /** @var Entity\Repository $repository */
        $repository = $fixtureFactory->createOne(Entity\Repository::class);

        $project = new Entity\Project(
            $name,
            $repository
        );

        self::assertStringIsUuid($project->id());
        self::assertSame($name, $project->name());
        self::assertSame($repository, $project->repository());
    }
}
