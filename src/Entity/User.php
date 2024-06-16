<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

namespace App\Entity;

use App\Repository;
use Doctrine\Common;
use Doctrine\ORM;
use Ramsey\Uuid;

#[ORM\Mapping\Entity(repositoryClass: Repository\UserRepository::class)]
#[ORM\Mapping\Table(name: 'user')]
final class User
{
    #[ORM\Mapping\Column(
        name: 'id',
        type: 'string',
        length: 36,
    )]
    #[ORM\Mapping\GeneratedValue(strategy: 'NONE')]
    #[ORM\Mapping\Id()]
    private string $id;

    #[ORM\Mapping\Column(
        name: 'login',
        type: 'string',
        length: 255,
    )]
    private string $login;

    #[ORM\Mapping\Column(
        name: 'location',
        type: 'string',
        length: 255,
        nullable: true,
    )]
    private ?string $location;

    #[ORM\Mapping\Embedded(
        class: Avatar::class,
        columnPrefix: 'avatar',
    )]
    private Avatar $avatar;

    /**
     * @var Common\Collections\ArrayCollection<int, Organization>
     */
    #[ORM\Mapping\ManyToMany(
        targetEntity: Organization::class,
        mappedBy: 'members',
    )]
    private Common\Collections\ArrayCollection $organizations;

    public function __construct(
        string $login,
        Avatar $avatar,
        ?string $location = null,
    ) {
        $this->id = Uuid\Uuid::uuid4()->toString();
        $this->login = $login;
        $this->avatar = $avatar;
        $this->location = $location;
        $this->organizations = new Common\Collections\ArrayCollection();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function login(): string
    {
        return $this->login;
    }

    public function avatar(): Avatar
    {
        return $this->avatar;
    }

    public function renameTo(string $login): void
    {
        $this->login = $login;
    }

    public function location(): ?string
    {
        return $this->location;
    }

    /**
     * @return array<int, Organization>
     */
    public function organizations(): array
    {
        return $this->organizations->toArray();
    }
}
