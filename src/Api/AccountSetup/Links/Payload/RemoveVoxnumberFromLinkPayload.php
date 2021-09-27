<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class RemoveVoxnumberFromLinkPayload
{
    public const GROUP_REMOVE = 'voxnumber_remove';

    /** @var array<int, string> */
    #[SerializedName('link_id')]
    #[Groups(groups: [self::GROUP_REMOVE])]
    #[Assert\Valid(groups: [self::GROUP_REMOVE])]
    public array $linkIds;

    /**
     * @param array<int, string> $linkIds
     */
    public function __construct(array $linkIds)
    {
        $this->linkIds = $linkIds;
    }
}
