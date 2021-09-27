<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class RemoveCategoryFromLinkPayload
{
    public const GROUP_REMOVE = 'category_remove';

    /** @var array<int, CategoryPayload> */
    #[SerializedName('link')]
    #[Groups(groups: [self::GROUP_REMOVE])]
    #[Assert\Valid(groups: [self::GROUP_REMOVE])]
    public array $links;

    /**
     * @param array<int, CategoryPayload> $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }
}
