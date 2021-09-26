<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Yproximite\IovoxBundle\Model\AbstractModel;

class TimeFrameModel extends AbstractModel
{
    /**
     * @param array<int, string> $days
     */
    private function __construct(public ?string $dateFrom, public ?string $dateTo, public ?string $recurrence, public ?string $timeFrom, public ?string $timeTo, public array $days)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['date_from'],
            $opts['date_to'],
            $opts['recurrence'],
            $opts['time_from'],
            $opts['time_to'],
            $opts['days']['day'] ?? [],
        );
    }
}
