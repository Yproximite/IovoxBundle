<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AttachVoxnumberToLinkPayload
{
    public const GROUP_ATTACH = 'voxnumber_attach';

    /** @var array<int, VoxNumberPayload> */
    #[SerializedName('link')]
    #[Groups(groups: [self::GROUP_ATTACH])]
    #[Assert\Valid(groups: [self::GROUP_ATTACH])]
    public array $links;

    /**
     * @param array<int, VoxNumberPayload> $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }
}
