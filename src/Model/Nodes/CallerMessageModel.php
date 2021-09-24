<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class CallerMessageModel extends AbstractModel
{
    /**
     * @param Collection<int, SoundFileModel> $soundFiles
     */
    protected function __construct(public Collection $soundFiles)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            (new ArrayCollection(static::formatResult($opts['sound_files'] ?? [], false)))->map(fn ($v): SoundFileModel => SoundFileModel::create($v))
        );
    }
}
