<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\GenericErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

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

        if (Response::HTTP_NO_CONTENT === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
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

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new GenericErrorResult(400, 'Sound Files Empty', 'Add one or more sound files to the request'),
            new GenericErrorResult(400, 'Sound Label \d+ of \d+ Empty', 'Add or remove sound_file x (item) of y (total)'),
            new GenericErrorResult(400, 'Sound File \d+ of \d+ Does not exist', 'Correct sound_file x (item) of y (total) to a soundfile that exists'),
            new InternalErrorResult(),
        ];
    }
}
