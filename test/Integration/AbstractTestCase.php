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

namespace App\Test\Integration;

use Doctrine\ORM;
use Symfony\Bundle;

abstract class AbstractTestCase extends Bundle\FrameworkBundle\Test\KernelTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel([
            'debug' => false,
        ]);
    }

    final protected static function entityManager(): ORM\EntityManagerInterface
    {
        return self::getContainer()->get(ORM\EntityManagerInterface::class);
    }
}
