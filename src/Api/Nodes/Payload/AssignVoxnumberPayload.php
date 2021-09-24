<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;

class AssignVoxnumberPayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $method;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $voxnumberIdd;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $areaCode;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $fullVoxnumber;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $voxnumberCountry;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $postcode;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?int $fallbackAreaDistance;

    public function __construct(
        ?string $method = null,
        ?string $voxnumberIdd = null,
        ?string $areaCode = null,
        ?string $fullVoxnumber = null,
        ?string $voxnumberCountry = null,
        ?string $postcode = null,
        ?int $fallbackAreaDistance = null
    ) {
        $this->method               = $method;
        $this->voxnumberIdd         = $voxnumberIdd;
        $this->areaCode             = $areaCode;
        $this->fullVoxnumber        = $fullVoxnumber;
        $this->voxnumberCountry     = $voxnumberCountry;
        $this->postcode             = $postcode;
        $this->fallbackAreaDistance = $fallbackAreaDistance;
    }
}
