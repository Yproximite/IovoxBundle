<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Yproximite\IovoxBundle\Api\AbstractApi;
use Yproximite\IovoxBundle\Api\Query;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\LimitQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\OutputQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\PageQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;

class GetSoundFiles extends AbstractApi
{
    public function executeQuery(array $queryParameters = [])
    {
        $query = new Query($this->method, $this->endpoint);
        foreach ($queryParameters as $key => $queryParameter) {
            if (!array_key_exists($key, $this->editableQueryParameters)) {
                throw new BadQueryParameterException($key, array_keys($this->editableQueryParameters));
            }

            $query->addQueryParameter($queryParameter, $this->editableQueryParameters[$key]);
        }

        foreach ($this->allQueryParameters as $queryParameter) {
            $query->addDefaultQueryParameter($queryParameter);
        }

        return json_decode($this->client->executeQuery($query));
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_GET;
    }

    protected function setEndpoint(): void
    {
        $this->endpoint = '/SoundFiles';
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            PageQueryParameter::getParameterName()    => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()   => new LimitQueryParameter(),
            'order'                                   => new GenericQueryParameter('order', GenericQueryParameter::TYPE_STRING),
            'req_fields'                              => new GenericQueryParameter('req_fields', GenericQueryParameter::TYPE_STRING),
            'sound_label'                             => new GenericQueryParameter('sound_label', GenericQueryParameter::TYPE_STRING),
            'sound_group'                             => new GenericQueryParameter('sound_group', GenericQueryParameter::TYPE_STRING),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getSoundFiles'),
            OutputQueryParameter::getParameterName()  => new OutputQueryParameter(),
        ], $this->editableQueryParameters);
    }
}
