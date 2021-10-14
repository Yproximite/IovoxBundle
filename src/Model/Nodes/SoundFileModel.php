<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Yproximite\IovoxBundle\Model\AbstractModel;

class SoundFileModel extends AbstractModel
{
    protected function __construct(public ?string $soundFile)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['sound_file'] ?? null
        );
    }
}
