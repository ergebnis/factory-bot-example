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

final class ProjectDefinitionProvider implements FactoryBot\EntityDefinitionProvider
{
    public function accept(FactoryBot\FixtureFactory $fixtureFactory): void
    {
        $fixtureFactory->define(Entity\Project::class, [
            'id' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->uuid();
            }),
            'name' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->word();
            }),
            'repository' => FactoryBot\FieldDefinition::reference(Entity\Repository::class),
        ]);
    }
}
