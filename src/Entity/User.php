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

use Doctrine\Common;
use Doctrine\ORM;
use Ramsey\Uuid;

/**
 * @ORM\Mapping\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @ORM\Mapping\Table(name="user")
 */
final class User
{
    /**
     * @ORM\Mapping\Id
     *
     * @ORM\Mapping\GeneratedValue(strategy="NONE")
     *
     * @ORM\Mapping\Column(
     *     name="id",
     *     type="string",
     *     length=36
     * )
     */
    private string $id;

    /**
     * @ORM\Mapping\Column(
     *     name="login",
     *     type="string"
     * )
     */
    private string $login;

    /**
     * @ORM\Mapping\Column(
     *     name="location",
     *     type="string",
     *     nullable=true
     * )
     */
    private ?string $location;

    /**
     * @ORM\Mapping\Embedded(
     *     class="App\Entity\Avatar",
     *     columnPrefix="avatar"
     * )
     */
    private Avatar $avatar;

    /**
     * @ORM\Mapping\ManyToMany(
     *     targetEntity="App\Entity\Organization",
     *     mappedBy="members"
     * )
     *
     * @var Common\Collections\ArrayCollection<int, Organization>
     */
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
