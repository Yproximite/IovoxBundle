<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class PurchaseVoxnumbersPayload
{
    public const GROUP_PURCHASE = 'purchase_voxnumbers';

    /** @var array{ item: array<int, PurchaseVoxnumberPayload>} */
    #[Groups(groups: [self::GROUP_PURCHASE])]
    #[Assert\Valid(groups: [self::GROUP_PURCHASE])]
    public array $items;

    #[Groups(groups: [self::GROUP_PURCHASE])]
    #[Assert\LessThanOrEqual(value: 120, groups: [self::GROUP_PURCHASE])]
    public ?string $callbackUrl;

    #[Groups(groups: [self::GROUP_PURCHASE])]
    public ?string $ccList;

    #[Groups(groups: [self::GROUP_PURCHASE])]
    #[Assert\Choice(choices: ['TRUE', 'FALSE'], groups: [self::GROUP_PURCHASE])]
    public ?string $dynamicQuantity;

    /**
     * @param array<int, PurchaseVoxnumberPayload> $items
     */
    public function __construct(array $items, ?string $callbackUrl = null, ?string $ccList = null, ?string $dynamicQuantity = null)
    {
        $this->items           = ['item' => $items];
        $this->callbackUrl     = $callbackUrl;
        $this->ccList          = $ccList;
        $this->dynamicQuantity = $dynamicQuantity;
    }
}
