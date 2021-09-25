<?php

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class SoundFilePayload
{
    #[Groups(groups: [SoundFilesPayload::GROUP_CREATE, SoundFilesPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [SoundFilesPayload::GROUP_CREATE, SoundFilesPayload::GROUP_UPDATE])]
    public ?string $soundLabel;

    #[Groups(groups: [SoundFilesPayload::GROUP_CREATE, SoundFilesPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [SoundFilesPayload::GROUP_CREATE])]
    public ?string $soundFile;

    #[Groups(groups: [SoundFilesPayload::GROUP_CREATE, SoundFilesPayload::GROUP_UPDATE])]
    public ?string $soundGroup;

    #[Groups(groups: [SoundFilesPayload::GROUP_CREATE, SoundFilesPayload::GROUP_UPDATE])]
    public ?string $notes;

    #[Groups(groups: [SoundFilesPayload::GROUP_UPDATE])]
    #[Assert\NotBlank(allowNull: true, groups: [SoundFilesPayload::GROUP_UPDATE])]
    public ?string $newSoundLabel;

    #[Groups(groups: [SoundFilesPayload::GROUP_UPDATE])]
    #[Assert\NotBlank(allowNull: true, groups: [SoundFilesPayload::GROUP_UPDATE])]
    public ?string $newSoundGroup;

    public function __construct(?string $soundLabel, ?string $soundFile = null, ?string $soundGroup = null, ?string $notes = null, ?string $newSoundLabel = null, ?string $newSoundGroup = null)
    {
        $this->soundLabel    = $soundLabel;
        $this->soundFile     = $soundFile;
        $this->soundGroup    = $soundGroup;
        $this->notes         = $notes;
        $this->newSoundLabel = $newSoundLabel;
        $this->newSoundGroup = $newSoundGroup;
    }
}
