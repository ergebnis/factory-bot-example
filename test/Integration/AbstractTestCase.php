<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace Ergebnis\Example\Test\Integration;

use Doctrine\ORM;
use Symfony\Bundle;

/**
 * @internal
 */
abstract class AbstractTestCase extends Bundle\FrameworkBundle\Test\KernelTestCase
{
    protected static Bundle\FrameworkBundle\Test\TestContainer $container;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel([
            'debug' => false,
        ]);
    }

    final protected static function entityManager(): ORM\EntityManagerInterface
    {
        return self::$container->get(ORM\EntityManagerInterface::class);
    }
}
