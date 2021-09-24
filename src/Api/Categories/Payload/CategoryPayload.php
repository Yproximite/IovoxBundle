<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Categories\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryPayload
{
    #[Groups(groups: [CategoriesPayload::GROUP_CREATE, CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE, CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    public ?string $categoryId;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE, CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE, CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    public ?string $label;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $value;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE])]
    public ?string $parentCategoryId;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    public ?string $type;

    #[Groups(groups: [CategoriesPayload::GROUP_CREATE_CONFIGURATION])]
    public ?string $colour;

    public function __construct(?string $categoryId, ?string $label = null, ?string $value = null, ?string $parentCategoryId = null, ?string $type = null, ?string $colour = null)
    {
        $this->categoryId       = $categoryId;
        $this->label            = $label;
        $this->value            = $value;
        $this->parentCategoryId = $parentCategoryId;
        $this->type             = $type;
        $this->colour           = $colour;
    }
}
