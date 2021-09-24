<?php

namespace Yproximite\IovoxBundle\Api\Categories\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryPayload
{
    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $categoryId;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $label;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $value;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $parentCategoryId;

    public function __construct(?string $categoryId, ?string $label = null, ?string $value = null, ?string $parentCategoryId = null)
    {
        $this->categoryId       = $categoryId;
        $this->label            = $label;
        $this->value            = $value;
        $this->parentCategoryId = $parentCategoryId;
    }
}
