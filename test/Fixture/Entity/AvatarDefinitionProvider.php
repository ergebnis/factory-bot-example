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

namespace App\Test\Fixture\Entity;

use App\Entity;
use Ergebnis\FactoryBot;
use Faker\Generator;

final class AvatarDefinitionProvider implements FactoryBot\EntityDefinitionProvider
{
    public function accept(FactoryBot\FixtureFactory $fixtureFactory): void
    {
        $fixtureFactory->define(Entity\Avatar::class, [
            'height' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): int {
                return $faker->numberBetween(300, 600);
            }),
            'url' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->imageUrl();
            }),
            'width' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): int {
                return $faker->numberBetween(400, 900);
            }),
        ]);
    }
}
