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

namespace App\Entity;

use Doctrine\ORM;

#[ORM\Mapping\Entity()]
#[ORM\Mapping\Table(name: 'code_of_conduct')]
class CodeOfConduct
{
    #[ORM\Mapping\Column(
        name: 'key',
        type: 'string',
        length: 255,
    )]
    #[ORM\Mapping\Id()]
    private string $key;

    #[ORM\Mapping\Column(
        name: 'name',
        type: 'string',
        length: 255,
    )]
    private string $name;

    #[ORM\Mapping\Column(
        name: 'url',
        type: 'string',
        length: 255,
    )]
    private string $url;

    #[ORM\Mapping\Column(
        name: 'body',
        type: 'text',
    )]
    private string $body;

    public function __construct(
        string $key,
        string $name,
        string $url,
        string $body,
    ) {
        $this->key = $key;
        $this->name = $name;
        $this->url = $url;
        $this->body = $body;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function body(): string
    {
        return $this->body;
    }
}
