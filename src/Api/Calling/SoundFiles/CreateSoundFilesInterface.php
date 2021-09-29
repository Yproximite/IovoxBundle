<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilesPayload;

interface CreateSoundFilesInterface
{
    public function executeQuery(SoundFilesPayload $payload): bool;
}
