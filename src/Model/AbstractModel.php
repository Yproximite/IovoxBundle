<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

abstract class AbstractModel
{
    /**
     * @param array<string, mixed> $opts
     *
     * @return mixed|null
     */
    abstract public static function create(array $opts);
}
