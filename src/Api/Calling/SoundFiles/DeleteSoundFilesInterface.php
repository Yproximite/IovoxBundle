<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

interface DeleteSoundFilesInterface
{
    public const QUERY_PARAMETER_SOUND_FILES = 'sound_files';

    /**
     * @param array{ sound_files: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
