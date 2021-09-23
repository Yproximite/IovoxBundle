<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;

/**
 * @see https://docs.iovox.com/display/RA/deleteSoundFiles
 */
class DeleteSoundFiles extends AbstractSoundFiles
{
    public const QUERY_PARAMETER_SOUND_FILES = 'sound_files';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        return $response->getStatusCode() === Response::HTTP_NO_CONTENT;
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_DELETE;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            static::QUERY_PARAMETER_SOUND_FILES => new GenericQueryParameter(static::QUERY_PARAMETER_SOUND_FILES, GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all sound files (sound_label;sound_group) to be deleted', true),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteSoundFiles'),
        ], $this->editableQueryParameters);
    }
}
