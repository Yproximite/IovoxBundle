<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryPayload
{
    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE])]
    public ?string $linkId;

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE, LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE, LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    public ?string $categoryId;

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    public ?string $parentCategoryId;

    #[Groups(groups: [LinksPayload::GROUP_CREATE, LinksPayload::GROUP_UPDATE])]
    public ?string $value;

    public function __construct(?string $linkId = null, ?string $categoryId = null, ?string $parentCategoryId = null, ?string $value)
    {
        $this->linkId           = $linkId;
        $this->categoryId       = $categoryId;
        $this->parentCategoryId = $parentCategoryId;
        $this->value            = $value;
    }
}
