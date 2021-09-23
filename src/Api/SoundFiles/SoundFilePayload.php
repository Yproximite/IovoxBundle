<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

class SoundFilePayload
{
    public function __construct(public string $soundLabel, public string $soundFile, public ?string $soundGroup = null, public ?string $notes = null)
    {
    }
}
