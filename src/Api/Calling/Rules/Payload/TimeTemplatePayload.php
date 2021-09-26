<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class TimeTemplatePayload
{
    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $label;

    /** @var array{ time_frame: array<int, TimeFramePayload>} */
    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Valid(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public array $timeFrames;

    #[Groups(groups: [TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $newLabel;

    /**
     * @param array<int, TimeFramePayload> $timeFrames
     */
    public function __construct(?string $label = null, array $timeFrames = [], ?string $newLabel = null)
    {
        $this->label      = $label;
        $this->timeFrames = ['time_frame' => $timeFrames];
        $this->newLabel   = $newLabel;
    }
}
