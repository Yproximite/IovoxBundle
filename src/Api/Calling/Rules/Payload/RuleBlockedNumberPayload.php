<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class RuleBlockedNumberPayload
{
    /** @var array{ link_id?: array<int, string>} */
    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public array $linkIds;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $timeTemplate;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['BLOCK', 'ALLOW'], groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $blockingType;

    /**
     * @param array<int, string> $linkIds
     */
    public function __construct(array $linkIds = [], ?string $timeTemplate = null, ?string $blockingType = null)
    {
        $this->linkIds      = ['link_id' => $linkIds];
        $this->timeTemplate = $timeTemplate;
        $this->blockingType = $blockingType;
    }
}
