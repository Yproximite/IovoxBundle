<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlParseErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Exception\Api\SerializedXmlException;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

/**
 * @see https://docs.iovox.com/display/RA/updateCallFlow
 */
class UpdateCallFlow extends AbstractCallFlow
{
    public function __construct(protected Client $client, protected IovoxSerializer $serializer, protected ValidatorInterface $validator)
    {
        parent::__construct($client);
    }

    /**
     * @param array<int|string, mixed> $payload
     */
    public function executeQuery(array $payload): bool
    {
        $query = $this->createQuery();

        try {
            // TODO: convert payload to object
            $query->setContent($this->serializer->serialize($payload, 'xml'));
        } catch (\Throwable) {
            throw new SerializedXmlException();
        }

        $response = $this->client->executeQuery($query);
        if (Response::HTTP_NO_CONTENT === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
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
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('updateCallFlow'),
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
            new InternalErrorResult(),
        ];
    }
}
