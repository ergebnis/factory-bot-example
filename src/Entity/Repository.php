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

namespace Ergebnis\Example\Entity;

use Doctrine\ORM;
use Ramsey\Uuid;

/**
 * @ORM\Mapping\Entity
 * @ORM\Mapping\Table(name="repository")
 */
class Repository
{
    /**
     * @ORM\Mapping\Id
     * @ORM\Mapping\GeneratedValue(strategy="NONE")
     * @ORM\Mapping\Column(
     *     name="id",
     *     type="string"
     * )
     *
     * @var string
     */
    private $id;

    /**
     * @ORM\Mapping\Column(
     *     name="name",
     *     type="string"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Mapping\ManyToOne(
     *     targetEntity="Ergebnis\Example\Entity\Organization",
     *     inversedBy="repositories"
     * )
     * @ORM\Mapping\JoinColumn(
     *     name="organization_id",
     *     referencedColumnName="id",
     *     nullable=false
     * )
     *
     * @var Organization
     */
    private $organization;

    /**
     * @ORM\Mapping\ManyToOne(targetEntity="Ergebnis\Example\Entity\Repository")
     * @ORM\Mapping\JoinColumn(
     *     name="template_id",
     *     referencedColumnName="id"
     * )
     *
     * @var null|Repository
     */
    private $template;

    /**
     * @ORM\Mapping\ManyToOne(targetEntity="Ergebnis\Example\Entity\CodeOfConduct")
     * @ORM\Mapping\JoinColumn(
     *     name="code_of_conduct_key",
     *     referencedColumnName="key"
     * )
     *
     * @var null|CodeOfConduct
     */
    private $codeOfConduct;

    public function __construct(
        Organization $organization,
        string $name,
        ?self $template = null,
        ?CodeOfConduct $codeOfConduct = null
    ) {
        $this->id = Uuid\Uuid::uuid4()->toString();
        $this->organization = $organization;
        $this->name = $name;
        $this->template = $template;
        $this->codeOfConduct = $codeOfConduct;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function organization(): Organization
    {
        return $this->organization;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function template(): ?self
    {
        return $this->template;
    }

    public function codeOfConduct(): ?CodeOfConduct
    {
        return $this->codeOfConduct;
    }
}
