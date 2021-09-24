<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryPayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $categoryId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $parentCategoryId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?string $value;

    public function __construct(?string $categoryId = null, ?string $parentCategoryId = null, ?string $value = null)
    {
        $this->categoryId       = $categoryId;
        $this->parentCategoryId = $parentCategoryId;
        $this->value            = $value;
    }
}
