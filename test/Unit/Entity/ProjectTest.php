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

namespace App\Test\Unit\Entity;

use App\Entity;
use App\Test\Unit;

/**
 * @internal
 *
 * @covers \App\Entity\Project
 */
final class ProjectTest extends Unit\AbstractTestCase
{
    public function testConstructorSetsValues(): void
    {
        $name = self::faker()->userName;

        /** @var Entity\Repository $repository */
        $repository = self::fixtureFactory()->createOne(Entity\Repository::class);

        $project = new Entity\Project(
            $name,
            $repository,
        );

        self::assertStringIsUuid($project->id());
        self::assertSame($name, $project->name());
        self::assertSame($repository, $project->repository());
    }
}
