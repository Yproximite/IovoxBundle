<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class TimeTemplateModel extends AbstractModel
{
    /**
     * @param Collection<int, TimeFrameModel> $timeFrames
     */
    private function __construct(public ?string $label, public Collection $timeFrames)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['label'],
            (new ArrayCollection(static::formatResult($opts['time_frames']['time_frame'] ?? [], false)))->map(fn ($v): TimeFrameModel => TimeFrameModel::create($v))
        );
    }
}
