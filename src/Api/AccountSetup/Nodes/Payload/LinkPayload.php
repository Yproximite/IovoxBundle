<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class LinkPayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $linkId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $linkName;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $linkType;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?\DateTimeImmutable $linkDate;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?int $clickToCall;

    /** @var array{ category:array<int, CategoryPayload>|null} */
    #[SerializedName('categories')]
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\Valid(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public array $categories;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\Valid(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?AssignVoxnumberPayload $assignVoxnumber;

    /**
     * @param array<int, CategoryPayload>|null $categories
     */
    public function __construct(
        ?string $linkId = null,
        ?string $linkName = null,
        ?string $linkType = null,
        ?\DateTimeImmutable $linkDate = null,
        ?int $clickToCall = null,
        ?array $categories = null,
        ?AssignVoxnumberPayload $assignVoxnumber = null
    ) {
        $this->linkId          = $linkId;
        $this->linkName        = $linkName;
        $this->linkType        = $linkType;
        $this->linkDate        = $linkDate;
        $this->clickToCall     = $clickToCall;
        $this->categories      = ['category' => $categories];
        $this->assignVoxnumber = $assignVoxnumber;
    }
}
