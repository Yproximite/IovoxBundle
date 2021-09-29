<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

interface GetSoundFileDataInterface
{
    public const QUERY_PARAMETER_SOUND_LABEL = 'sound_label';
    public const QUERY_PARAMETER_SOUND_GROUP = 'sound_group';

    /**
     * @param array{ sound_label: non-empty-string, sound_group?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): string;
}
