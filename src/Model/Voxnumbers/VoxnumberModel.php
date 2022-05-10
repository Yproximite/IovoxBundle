<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Voxnumbers;

use Yproximite\IovoxBundle\Model\AbstractModel;

class VoxnumberModel extends AbstractModel
{
    private function __construct(
        public ?string $linkId,
        public ?string $assignedStatus,
        public ?string $callStatus,
        public ?string $countryCode,
        public ?string $voxnumber,
        public ?string $voxNumberType,
        public ?string $voxNumberCountry,
        public ?string $voxNumberCity,
        public ?\DateTimeImmutable $purchaseDate,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['link_id'] ?? null,
            $opts['assigned_status'] ?? null,
            $opts['call_status'] ?? null,
            $opts['country_code'] ?? null,
            $opts['voxnumber'] ?? null,
            $opts['voxnumber_type'] ?? null,
            $opts['voxnumber_country'] ?? null,
            $opts['voxnumber_city'] ?? null,
            \array_key_exists('purchase_date', $opts) ? new \DateTimeImmutable($opts['purchase_date']) : null,
        );
    }
}
