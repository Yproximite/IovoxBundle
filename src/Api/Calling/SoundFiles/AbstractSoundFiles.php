<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractSoundFiles extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/SoundFiles';
    }
}
