<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace Ergebnis\Example\Test\Fixture\Entity;

use Ergebnis\Example\Entity;
use Ergebnis\FactoryBot;
use Faker\Generator;

final class OrganizationDefinitionProvider implements FactoryBot\EntityDefinitionProvider
{
    public function accept(FactoryBot\FixtureFactory $fixtureFactory): void
    {
        $fixtureFactory->define(Entity\Organization::class, [
            'id' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->uuid;
            }),
            'isVerified' => FactoryBot\FieldDefinition::optionalClosure(static function (Generator $faker): bool {
                return $faker->boolean;
            }),
            'members' => FactoryBot\FieldDefinition::references(
                Entity\User::class,
                FactoryBot\Count::between(1, 10)
            ),
            'name' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->word;
            }),
            'url' => FactoryBot\FieldDefinition::optionalClosure(static function (Generator $faker): string {
                return $faker->url;
            }),
        ]);
    }
}
