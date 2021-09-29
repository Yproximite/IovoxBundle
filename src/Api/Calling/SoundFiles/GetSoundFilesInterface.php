<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Yproximite\IovoxBundle\Model\SoundFiles\GetSoundFilesModel;

interface GetSoundFilesInterface
{
    public const QUERY_PARAMETER_ORDER       = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS  = 'req_fields';
    public const QUERY_PARAMETER_SOUND_LABEL = 'sound_label';
    public const QUERY_PARAMETER_SOUND_GROUP = 'sound_group';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, order?: non-empty-string, req_fields?: non-empty-string, sound_label?: non-empty-string, sound_group?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetSoundFilesModel;
}
