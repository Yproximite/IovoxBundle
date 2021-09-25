<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class PurchaseVoxnumberPayload
{
    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\NotNull(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?int $countryCode;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\NotNull(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?int $areaCode;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $postCode;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $cityName;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\NotNull(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\Choice(choices: ['NATIONAL', 'GEOGRAPHIC', 'TOLLFREE'], groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $numberType;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\NotNull(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?int $quantity;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    #[Assert\Valid(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?PurchaseVoxNumberAdditionalInformationPayload $additionalInformation;

    public function __construct(
        ?int $countryCode,
        ?int $areaCode = null,
        ?string $numberType = null,
        ?int $quantity = null,
        ?PurchaseVoxNumberAdditionalInformationPayload $additionalInformation = null,
        ?string $postCode = null,
        ?string $cityName = null,
    ) {
        $this->countryCode           = $countryCode;
        $this->areaCode              = $areaCode;
        $this->numberType            = $numberType;
        $this->quantity              = $quantity;
        $this->additionalInformation = $additionalInformation;
        $this->postCode              = $postCode;
        $this->cityName              = $cityName;
    }
}
