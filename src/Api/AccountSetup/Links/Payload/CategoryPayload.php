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

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH, RemoveCategoryFromLinkPayload::GROUP_REMOVE])]
    public ?string $categoryId;

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    public ?string $parentCategoryId;

    public function __construct(?string $linkId = null, ?string $categoryId = null, ?string $parentCategoryId = null)
    {
        $this->linkId           = $linkId;
        $this->categoryId       = $categoryId;
        $this->parentCategoryId = $parentCategoryId;
    }
}
