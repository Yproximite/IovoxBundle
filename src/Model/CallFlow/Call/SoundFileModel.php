<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call;

use Yproximite\IovoxBundle\Model\AbstractModel;

class SoundFileModel extends AbstractModel
{
    private function __construct(public ?string $soundLabel, public ?string $soundGroup)
    {
    }

    public static function create(array $opts): self
    {
        $soundFileAttributes = $opts['@attributes'];

        return new self(
            $soundFileAttributes['soundLabel'] ?? null,
            $soundFileAttributes['soundGroup'] ?? null,
        );
    }
}
