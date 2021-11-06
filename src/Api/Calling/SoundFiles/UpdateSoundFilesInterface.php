<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface UpdateSoundFilesInterface extends XmlQueryStringInterface
{
    public function executeQuery(SoundFilesPayload $payload): bool;
}
