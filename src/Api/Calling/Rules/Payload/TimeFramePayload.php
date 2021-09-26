<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class TimeFramePayload
{
    public const DAY_MONDAY    = 'MON';
    public const DAY_TUESDAY   = 'TUE';
    public const DAY_WEDNESDAY = 'WED';
    public const DAY_THURSDAY  = 'THU';
    public const DAY_FRIDAY    = 'FRI';
    public const DAY_SATURDAY  = 'SAT';
    public const DAY_SUNDAY    = 'SUN';

    public const ALL_WEEK = [
        self::DAY_MONDAY,
        self::DAY_TUESDAY,
        self::DAY_WEDNESDAY,
        self::DAY_THURSDAY,
        self::DAY_FRIDAY,
        self::DAY_SATURDAY,
        self::DAY_SUNDAY,
    ];

    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Date(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $dateFrom;

    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Date(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $dateTo;

    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['YEARLY', 'MONTHLY', 'NONE'], groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $recurrence;

    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Regex(pattern: '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $timeFrom;

    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\Regex(pattern: '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public ?string $timeTo;

    /** @var array{ day?: array<int, string>} */
    #[Groups(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    #[Assert\NotBlank(groups: [TimeTemplatesPayload::GROUP_CREATE, TimeTemplatesPayload::GROUP_UPDATE])]
    public array $days;

    /**
     * @param array<int, string> $days
     */
    public function __construct(?string $dateFrom = null, ?string $dateTo = null, ?string $recurrence = null, ?string $timeFrom = null, ?string $timeTo = null, array $days = self::ALL_WEEK)
    {
        $this->dateFrom   = $dateFrom;
        $this->dateTo     = $dateTo;
        $this->recurrence = $recurrence;
        $this->timeFrom   = $timeFrom;
        $this->timeTo     = $timeTo;
        $this->days       = [] !== $days ? ['day' => $days] : [];
    }
}
