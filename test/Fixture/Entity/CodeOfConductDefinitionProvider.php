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

final class CodeOfConductDefinitionProvider implements FactoryBot\EntityDefinitionProvider
{
    public function accept(FactoryBot\FixtureFactory $fixtureFactory): void
    {
        $fixtureFactory->define(Entity\CodeOfConduct::class, [
            'body' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->realText();
            }),
            'key' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->word();
            }),
            'name' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->sentence();
            }),
            'url' => FactoryBot\FieldDefinition::closure(static function (Generator $faker): string {
                return $faker->url();
            }),
        ]);
    }
}
