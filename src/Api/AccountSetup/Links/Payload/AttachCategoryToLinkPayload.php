<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AttachCategoryToLinkPayload
{
    public const GROUP_ATTACH = 'category_attach';

    /** @var array<int, CategoryPayload> */
    #[SerializedName('link')]
    #[Groups(groups: [self::GROUP_ATTACH])]
    #[Assert\Valid(groups: [self::GROUP_ATTACH])]
    public array $links;

    /**
     * @param array<int, CategoryPayload> $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }
}
