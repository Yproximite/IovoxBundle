<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\LimitQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\OutputQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\PageQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;

/**
 * @see https://docs.iovox.com/display/RA/getSoundFiles
 */
class GetSoundFiles extends AbstractSoundFiles
{
    public const QUERY_PARAMETER_ORDER       = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS  = 'req_fields';
    public const QUERY_PARAMETER_SOUND_LABEL = 'sound_label';
    public const QUERY_PARAMETER_SOUND_GROUP = 'sound_group';

    /**
     * @param array<string, string|int> $queryParameters
     *
     * @return array<string, mixed>
     */
    public function executeQuery(array $queryParameters = []): array
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        return json_decode($response->getContent());
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_GET;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            PageQueryParameter::getParameterName()  => new PageQueryParameter(),
            LimitQueryParameter::getParameterName() => new LimitQueryParameter(),
            static::QUERY_PARAMETER_ORDER           => new GenericQueryParameter(static::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING),
            static::QUERY_PARAMETER_REQ_FIELDS      => new GenericQueryParameter(static::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING),
            static::QUERY_PARAMETER_SOUND_LABEL     => new GenericQueryParameter(static::QUERY_PARAMETER_SOUND_LABEL, GenericQueryParameter::TYPE_STRING),
            static::QUERY_PARAMETER_SOUND_GROUP     => new GenericQueryParameter(static::QUERY_PARAMETER_SOUND_GROUP, GenericQueryParameter::TYPE_STRING),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getSoundFiles'),
            OutputQueryParameter::getParameterName()  => new OutputQueryParameter(),
        ], $this->editableQueryParameters);
    }
}
