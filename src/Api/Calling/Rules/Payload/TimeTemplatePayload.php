<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class TimeTemplatePayload
{
    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [TimeTemplatesPayload::GROUP_CREATE])]
    public ?string $label;

    /** @var array{ time_frame: array<int, TimeFramePayload>} */
    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE])]
    #[Assert\Valid(groups: [TimeTemplatesPayload::GROUP_CREATE])]
    public array $timeFrames;

    /**
     * @param array<int, TimeFramePayload> $timeFrames
     */
    public function __construct(?string $label = null, array $timeFrames = [])
    {
        $this->label      = $label;
        $this->timeFrames = ['time_frame' => $timeFrames];
    }
}
