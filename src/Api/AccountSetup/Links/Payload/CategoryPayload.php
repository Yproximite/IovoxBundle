<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryPayload
{
    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    public ?string $linkId;

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    public ?string $parentCategoryId;

    #[Groups(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [AttachCategoryToLinkPayload::GROUP_ATTACH])]
    public ?string $categoryId;

    public function __construct(?string $linkId = null, ?string $parentCategoryId = null, ?string $categoryId = null)
    {
        $this->linkId           = $linkId;
        $this->parentCategoryId = $parentCategoryId;
        $this->categoryId       = $categoryId;
    }
}
