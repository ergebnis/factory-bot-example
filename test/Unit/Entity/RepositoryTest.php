<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2025 Andreas Möller
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

#[Framework\Attributes\CoversClass(Entity\Repository::class)]
final class RepositoryTest extends Unit\AbstractTestCase
{
    public function testDefaults(): void
    {
        $name = self::faker()->userName();

        $fixtureFactory = self::fixtureFactory();

        /** @var Entity\Organization $organization */
        $organization = $fixtureFactory->createOne(Entity\Organization::class);

        $repository = new Entity\Repository(
            $organization,
            $name,
        );

        self::assertStringIsUuid($repository->id());
        self::assertNull($repository->codeOfConduct());
        self::assertNull($repository->template());
    }

    public function testConstructorSetsValues(): void
    {
        $name = self::faker()->userName();

        $fixtureFactory = self::fixtureFactory();

        /** @var Entity\Organization $organization */
        $organization = $fixtureFactory->createOne(Entity\Organization::class);

        /** @var Entity\Repository $template */
        $template = $fixtureFactory->createOne(Entity\Repository::class, [
            'template' => null,
        ]);

        /** @var Entity\CodeOfConduct $codeOfConduct */
        $codeOfConduct = $fixtureFactory->createOne(Entity\CodeOfConduct::class);

        $repository = new Entity\Repository(
            $organization,
            $name,
            $template,
            $codeOfConduct,
        );

        self::assertSame($codeOfConduct, $repository->codeOfConduct());
        self::assertSame($name, $repository->name());
        self::assertSame($organization, $repository->organization());
        self::assertSame($template, $repository->template());
    }
}
