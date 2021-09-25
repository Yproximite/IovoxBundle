<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Purchase;

use Yproximite\IovoxBundle\Model\AbstractModel;

class VoxnumberModel extends AbstractModel
{
    private function __construct(public ?string $fullVoxNumber, public ?string $areaCode, public ?string $countryCode)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['full_voxnumber'] ?? null,
            $opts['area_code'] ?? null,
            $opts['country_code'] ?? null,
        );
    }
}
