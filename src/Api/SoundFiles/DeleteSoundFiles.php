<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Yproximite\IovoxBundle\Api\AbstractApi;
use Yproximite\IovoxBundle\Api\Query;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;

class DeleteSoundFiles extends AbstractApi
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
        $this->method = Request::METHOD_DELETE;
    }

    protected function setEndpoint(): void
    {
        $this->endpoint = '/SoundFiles';
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            'sound_files' => new GenericQueryParameter('sound_files', GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all sound files (sound_label;sound_group) to be deleted', true),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteSoundFiles'),
        ], $this->editableQueryParameters);
    }
}
