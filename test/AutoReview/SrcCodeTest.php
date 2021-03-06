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

namespace Ergebnis\Example\Test\AutoReview;

use Ergebnis\Example;
use Ergebnis\Test\Util;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @coversNothing
 */
final class SrcCodeTest extends Framework\TestCase
{
    use Util\Helper;

    public function testSrcClassesHaveUnitTests(): void
    {
        self::assertClassesHaveTests(
            __DIR__ . '/../../src',
            'Ergebnis\\Example\\',
            'Ergebnis\\Example\\Test\\Unit\\',
            [
                Example\Entity\Avatar::class,
                Example\Entity\CodeOfConduct::class,
                Example\Entity\Organization::class,
                Example\Entity\Project::class,
                Example\Entity\Repository::class,
                Example\Kernel::class,
                Example\Repository\UserRepository::class,
            ]
        );
    }
}
