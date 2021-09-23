<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Yproximite\IovoxBundle\Api\AbstractApi;
use Yproximite\IovoxBundle\Api\Query;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;

class CreateSoundFiles extends AbstractApi
{
    public function __construct(protected Client $client, protected SerializerInterface $serializer)
    {
        parent::__construct($client);
    }

    public function executeQuery(array $queryParameters = [], array $payload = [])
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

        // HELP ME
        $dom = new \DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $root = $dom->createElement('request');
        $soundFileParent = $dom->createElement('sound_file');
        $soundLabel = $dom->createElement('sound_label', 'sound_label');
        $soundFile = $dom->createElement('sound_file', 'sound_file');
        $soundFileParent->appendChild($soundLabel);
        $soundFileParent->appendChild($soundFile);
        $root->appendChild($soundFileParent);
        $soundFileParent = $dom->createElement('sound_file');
        $soundLabel = $dom->createElement('sound_label', 'sound_label');
        $soundFile = $dom->createElement('sound_file', 'sound_file');
        $soundFileParent->appendChild($soundLabel);
        $soundFileParent->appendChild($soundFile);
        $root->appendChild($soundFileParent);
        $dom->appendChild($root);

        dd($dom);

        dd($this->serializer->serialize($payload, 'xml'));

        return json_decode($this->client->executeQuery($query));
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_POST;
    }

    protected function setEndpoint(): void
    {
        $this->endpoint = '/SoundFiles';
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('createSoundFiles'),
        ], $this->editableQueryParameters);
    }
}
