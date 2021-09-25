<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\SoundFiles;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yproximite\IovoxBundle\Api\ErrorResult\GenericErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlParseErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Exception\Api\ValidationPayloadException;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

/**
 * @see https://docs.iovox.com/display/RA/createSoundFiles
 */
class CreateSoundFiles extends AbstractSoundFiles
{
    public function __construct(protected Client $client, protected IovoxSerializer $serializer, protected ValidatorInterface $validator)
    {
        parent::__construct($client);
    }

    public function executeQuery(SoundFilesPayload $payload): bool
    {
        $query = $this->createQuery();

        $validate = $this->validator->validate($payload, null, [SoundFilesPayload::GROUP_CREATE]);
        if ($validate->count() > 0) {
            throw new ValidationPayloadException($validate);
        }

        $query->setContent($this->serializer->serialize($payload, 'xml', ['groups' => [SoundFilesPayload::GROUP_CREATE]]));
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_CREATED === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_POST;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('createSoundFiles'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new XmlEmptyErrorResult(),
            new XmlParseErrorResult(),
            new RequestEmptyErrorResult(),
            new GenericErrorResult(400, 'Sound Label \d+ of \d+ Empty', 'Add sound_label to sound_file x (item) of y (total)'),
            new GenericErrorResult(400, 'Sound Label \d+ of \d+ already exists in Sound Group', 'Remove or change sound_label x (item) of y (total)'),
            new GenericErrorResult(400, 'Sound Group \d+ of \d+ Forbidden', 'Change sound_group x (item) of y (total)'),
            new GenericErrorResult(400, 'Sound File \d+ of \d+ Empty', 'Add in sound_file base64 encoded binary data for sound_file x (item) of y (total)'),
            new GenericErrorResult(400, 'Sound File \d+ of \d+ Exceeds maximum allowed filesize', 'Change sound_file x (item) of y (total) to a smaller filesize file'),
            new GenericErrorResult(400, 'Duplicate Sound File Received', 'Remove any duplicate sound_label and sound_group combinations from the XML'),
            new InternalErrorResult(),
        ];
    }
}
