<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload;

use Symfony\Component\Serializer\Annotation\Groups;

class PurchaseVoxNumberAdditionalInformationPayload
{
    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $firstname;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $lastname;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $company;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $street;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?int $buildingNumber;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $city;

    #[Groups(groups: [PurchaseVoxnumbersPayload::GROUP_PURCHASE])]
    public ?string $zipcode;

    public function __construct(
        ?string $firstname = null,
        ?string $lastname = null,
        ?string $company = null,
        ?string $street = null,
        ?int $buildingNumber = null,
        ?string $city = null,
        ?string $zipcode = null
    ) {
        $this->firstname      = $firstname;
        $this->lastname       = $lastname;
        $this->company        = $company;
        $this->street         = $street;
        $this->buildingNumber = $buildingNumber;
        $this->city           = $city;
        $this->zipcode        = $zipcode;
    }
}
