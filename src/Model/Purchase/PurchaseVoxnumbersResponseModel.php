<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Purchase;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class PurchaseVoxnumbersResponseModel extends AbstractModel
{
    /**
     * @param Collection<int, VoxnumberModel> $voxnumbers
     */
    private function __construct(public ?string $orderReference, public ?string $orderStatus, public Collection $voxnumbers)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['order_reference'] ?? null,
            $opts['order_status'] ?? null,
            (new ArrayCollection(static::formatResult($opts['voxnumbers']['voxnumber'] ?? [], false)))->map(fn($v): VoxnumberModel => VoxnumberModel::create($v))
        );
    }
}
