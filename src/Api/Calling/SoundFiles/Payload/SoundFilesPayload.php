<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class SoundFilesPayload
{
    public const GROUP_CREATE = 'sound_file_create';
    public const GROUP_UPDATE = 'sound_file_update';

    /** @var array<int, SoundFilePayload> */
    #[SerializedName('sound_file')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    public array $soundFiles;

    /**
     * @param array<int, SoundFilePayload> $soundFiles
     */
    public function __construct(array $soundFiles = [])
    {
        $this->soundFiles = $soundFiles;
    }
}
