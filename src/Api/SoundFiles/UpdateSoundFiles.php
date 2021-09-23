<?php

namespace Yproximite\IovoxBundle\Api\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Api\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

/**
 * @see https://docs.iovox.com/display/RA/updateSoundFiles
 */
class UpdateSoundFiles extends AbstractSoundFiles
{
    public function __construct(protected Client $client, protected IovoxSerializer $serializer)
    {
        parent::__construct($client);
    }

    public function executeQuery(SoundFilesPayload $payload): bool
    {
        $query    = $this->createQuery();
        $query->setContent($this->serializer->serialize($payload, 'xml', ['groups' => [SoundFilesPayload::GROUP_UPDATE]]));
        $response = $this->client->executeQuery($query);

        return $response->getStatusCode() === Response::HTTP_NO_CONTENT;
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_PUT;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('updateSoundFiles'),
        ], $this->editableQueryParameters);
    }
}
