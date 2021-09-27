<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class VoxNumberPayload
{
    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?string $linkId;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    #[Assert\Choice(choices: ['BY AREA', 'BY VOXNUMBER', 'BY POSTCODE'], groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?string $method;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?int $voxnumberIdd;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?int $areaCode;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?int $fullVoxnumber;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    #[Assert\Choice(choices: ['UNITED KINGDOM', 'FRANCE'], groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?string $voxnumberCountry;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?string $postcode;

    #[Groups(groups: [AttachVoxnumberToLinkPayload::GROUP_ATTACH])]
    public ?int $fallbackAreaDistance;

    public function __construct(
        ?string $linkId = null,
        ?string $method = null,
        ?int $voxnumberIdd = null,
        ?int $areaCode = null,
        ?int $fullVoxnumber = null,
        ?string $voxnumberCountry = null,
        ?string $postcode = null,
        ?int $fallbackAreaDistance = null
    ) {
        $this->linkId               = $linkId;
        $this->method               = $method;
        $this->voxnumberIdd         = $voxnumberIdd;
        $this->areaCode             = $areaCode;
        $this->fullVoxnumber        = $fullVoxnumber;
        $this->voxnumberCountry     = $voxnumberCountry;
        $this->postcode             = $postcode;
        $this->fallbackAreaDistance = $fallbackAreaDistance;
    }
}
