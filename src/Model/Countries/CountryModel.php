<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Countries;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CountryModel extends AbstractModel
{
    private function __construct(public int $code, public ?string $name)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            (int) ($opts['code'] ?? 0),
            $opts['name'] ?? null,
        );
    }
}
