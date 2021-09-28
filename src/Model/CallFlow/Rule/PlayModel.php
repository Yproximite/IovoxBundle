<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\SoundFileModel;

class PlayModel extends AbstractModel
{
    /**
     * @param Collection<int, SoundFileModel> $soundFiles
     */
    private function __construct(public ?string $id, public ?string $label, public Collection $soundFiles)
    {
    }

    public static function create(array $opts): self
    {
        $playAttributes = $opts['@attributes'];

        return new self(
            $playAttributes['id'],
            $playAttributes['label'],
            (new ArrayCollection(static::formatResult($opts['soundFile'], false)))->map(fn($v): SoundFileModel => SoundFileModel::create($v)),
        );
    }
}
