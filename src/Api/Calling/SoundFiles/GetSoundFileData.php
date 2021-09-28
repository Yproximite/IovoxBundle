<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

/**
 * @see https://docs.iovox.com/display/RA/getSoundFileData
 */
class GetSoundFileData extends AbstractSoundFiles
{
    public const QUERY_PARAMETER_SOUND_LABEL = 'sound_label';
    public const QUERY_PARAMETER_SOUND_GROUP = 'sound_group';

    public function __construct(protected Client $client, protected IovoxSerializer $serializer)
    {
        parent::__construct($client);
    }

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): string
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return $response->getContent();
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_GET;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            self::QUERY_PARAMETER_SOUND_LABEL => new GenericQueryParameter(self::QUERY_PARAMETER_SOUND_LABEL, GenericQueryParameter::TYPE_STRING, 'The label of the sound file to return', true),
            self::QUERY_PARAMETER_SOUND_GROUP => new GenericQueryParameter(self::QUERY_PARAMETER_SOUND_GROUP, GenericQueryParameter::TYPE_STRING, 'The group of the sound file to return'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getSoundFileData'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new InternalErrorResult(),
        ];
    }
}
