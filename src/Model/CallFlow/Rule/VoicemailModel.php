<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\SoundFileModel;

class VoicemailModel extends AbstractModel
{
    /**
     * @param Collection<int, SoundFileModel> $voicemailMessage
     * @param Collection<int, SoundFileModel> $completedMessage
     */
    private function __construct(
        public ?string $id,
        public ?string $label,
        public ?string $from,
        public ?string $fromName,
        public ?string $subject,
        public ?string $silence,
        public int $maxDuration,
        public ?string $templateName,
        public ?string $destinationEmailAddress,
        public ?string $destinationContactId,
        public Collection $voicemailMessage,
        public Collection $completedMessage,
    ) {
    }

    public static function create(array $opts): self
    {
        $voicemailAttributes = $opts['@attributes'];

        return new self(
            $voicemailAttributes['id'],
            $voicemailAttributes['label'],
            $voicemailAttributes['from'],
            $voicemailAttributes['fromName'],
            $voicemailAttributes['subject'],
            $voicemailAttributes['silence'],
            (int) $voicemailAttributes['maxDuration'],
            $voicemailAttributes['templateName'],
            $voicemailAttributes['destinationEmailAddress'],
            $voicemailAttributes['destinationContactId'],
            (new ArrayCollection(static::formatResult($opts['voicemailMessage'], false)))->map(fn($v): SoundFileModel => SoundFileModel::create($v)),
            (new ArrayCollection(static::formatResult($opts['completedMessage'], false)))->map(fn($v): SoundFileModel => SoundFileModel::create($v)),
        );
    }
}
