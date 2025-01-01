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

namespace App\Repository;

use App\Entity;
use Doctrine\Bundle;
use Doctrine\Persistence;

/**
 * @phpstan-extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository<\App\Entity\User>
 */
final class UserRepository extends Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{
    public function __construct(Persistence\ManagerRegistry $registry)
    {
        parent::__construct(
            $registry,
            Entity\User::class,
        );
    }
}
