<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\SoundFiles;

use Yproximite\IovoxBundle\Model\AbstractModel;

class SoundFileModel extends AbstractModel
{
    private function __construct(
        public ?string $soundLabel,
        public ?string $soundGroup,
        public ?int $contentLength,
        public ?\DateTimeImmutable $created,
        public ?\DateTimeImmutable $updated,
        public ?string $notes
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['sound_label'] ?? null,
            $opts['sound_group'] ?? null,
            array_key_exists('created', $opts) ? (int) $opts['content_length'] : null,
            array_key_exists('created', $opts) ? new \DateTimeImmutable($opts['created']) : null,
            array_key_exists('updated', $opts) ? new \DateTimeImmutable($opts['updated']) : null,
            $opts['notes'] ?? null,
        );
    }
}
