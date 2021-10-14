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
            $opts['date_from'] ?? null,
            $opts['date_to'] ?? null,
            $opts['recurrence'] ?? null,
            $opts['time_from'] ?? null,
            $opts['time_to'] ?? null,
            $opts['days']['day'] ?? [],
        );
    }
}
