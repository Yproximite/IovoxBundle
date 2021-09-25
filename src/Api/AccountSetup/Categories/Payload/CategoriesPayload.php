<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class CategoriesPayload
{
    public const GROUP_CREATE               = 'categories_create';
    public const GROUP_CREATE_CONFIGURATION = 'categories_create_configuration';

    /**
     * @var array<int, CategoryPayload>
     */
    #[SerializedName('category')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_CREATE_CONFIGURATION])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_CREATE_CONFIGURATION])]
    public array $categories;

    /**
     * @param array<int, CategoryPayload> $categories
     */
    public function __construct(array $categories = [])
    {
        $this->categories = $categories;
    }
}
