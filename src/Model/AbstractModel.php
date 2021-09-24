<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

abstract class AbstractModel implements ModelInterface
{
    /**
     * @param array<string, mixed> $opts
     */
    abstract public static function create(array $opts): self;
}
