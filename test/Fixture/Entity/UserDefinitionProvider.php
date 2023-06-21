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

namespace App\Test\Fixture\Entity;

use App\Entity;
use Ergebnis\FactoryBot;
use Faker\Generator;

final class UserDefinitionProvider implements FactoryBot\EntityDefinitionProvider
{
    public function accept(FactoryBot\FixtureFactory $fixtureFactory): void
    {
        $fixtureFactory->define(Entity\User::class, [
            'avatar' => FactoryBot\FieldDefinition::reference(Entity\Avatar::class),
            'id' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->uuid();
            }),
            'location' => FactoryBot\FieldDefinition::optionalClosure(static function (Generator $faker): string {
                return $faker->city();
            }),
            'login' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->userName();
            }),
        ]);
    }
}
