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
            $opts['link_id'],
            $opts['assigned_status'],
            $opts['call_status'],
            $opts['country_code'],
            $opts['voxnumber'],
            $opts['voxnumber_type'],
            $opts['voxnumber_country'],
            $opts['voxnumber_city'],
            array_key_exists('purchase_date', $opts) ? new \DateTimeImmutable($opts['purchase_date']) : null,
        );
    }
}
