<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\SoundFiles;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\ModelInterface;

class SoundFileModel extends AbstractModel implements ModelInterface
{
    private function __construct(
        public ?string $soundLabel,
        public ?string $soundGroup,
        public int $contentLength,
        public \DateTimeImmutable $created,
        public \DateTimeImmutable $updated,
        public ?string $notes
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['sound_label'],
            $opts['sound_group'],
            (int) $opts['content_length'],
            new \DateTimeImmutable($opts['created']),
            new \DateTimeImmutable($opts['updated']),
            $opts['notes'],
        );
    }
}
