<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Purchase;

use Yproximite\IovoxBundle\Model\AbstractModel;

class VoxnumberRegionModel extends AbstractModel
{
    private function __construct(
        public ?string $areaCode,
        public ?string $countryCode,
        public ?string $countryName,
        public ?string $stateName,
        public ?string $cityName,
        public ?bool $requirePurchaseInfo,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['area_code'] ?? null,
            $opts['country_code'] ?? null,
            $opts['country_name'] ?? null,
            $opts['state_name'] ?? null,
            $opts['city_name'] ?? null,
            (bool) ($opts['require_purchase_info'] ?? null),
        );
    }
}
