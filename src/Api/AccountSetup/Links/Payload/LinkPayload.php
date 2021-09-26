<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class LinkPayload
{
    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $nodeId;

    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkId;

    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkName;

    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkType;

    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\Date(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkDate;

    #[Groups(groups: [LinksPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: [0, 1], groups: [LinksPayload::GROUP_CREATE])]
    public ?int $clickToCall;

    public function __construct(?string $nodeId = null, ?string $linkId = null, ?string $linkName = null, ?string $linkType = null, ?string $linkDate = null, ?int $clickToCall = null)
    {
        $this->nodeId      = $nodeId;
        $this->linkId      = $linkId;
        $this->linkName    = $linkName;
        $this->linkType    = $linkType;
        $this->linkDate    = $linkDate;
        $this->clickToCall = $clickToCall;
    }
}
