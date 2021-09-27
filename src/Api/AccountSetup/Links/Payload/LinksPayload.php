<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class LinksPayload
{
    public const GROUP_CREATE = 'links_create';
    public const GROUP_UPDATE = 'links_update';

    /** @var array<int, LinkPayload> */
    #[SerializedName('link')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    public array $links;

    /**
     * @param array<int, LinkPayload> $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }
}
