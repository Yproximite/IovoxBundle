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

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    public ?string $linkId;

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkName;

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkType;

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\Date(groups: [LinksPayload::GROUP_CREATE])]
    public ?string $linkDate;

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: [0, 1], groups: [LinksPayload::GROUP_CREATE])]
    public ?int $clickToCall;

    #[Groups(groups: [LinksPayload::GROUP_UPDATE])]
    public ?string $newLinkId;

    /** @var array{ category: array<int, CategoryPayload>|null } */
    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\Valid(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    public array $categories;

    /**
     * @param array<int, CategoryPayload>|null $categories
     */
    public function __construct(
        ?string $nodeId = null,
        ?string $linkId = null,
        ?string $linkName = null,
        ?string $linkType = null,
        ?string $linkDate = null,
        ?int $clickToCall = null,
        ?string $newLinkId = null,
        ?array $categories = null,
    ) {
        $this->nodeId      = $nodeId;
        $this->linkId      = $linkId;
        $this->linkName    = $linkName;
        $this->linkType    = $linkType;
        $this->linkDate    = $linkDate;
        $this->clickToCall = $clickToCall;
        $this->newLinkId   = $newLinkId;
        $this->categories  = ['category' => $categories];
    }
}
