<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Categories;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yproximite\IovoxBundle\Api\Categories\Payload\CategoriesPayload;
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
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Exception\Api\ValidationPayloadException;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

class CreateCategoryConfigurations extends AbstractCategories
{
    public function __construct(protected Client $client, protected IovoxSerializer $serializer, protected ValidatorInterface $validator)
    {
        parent::__construct($client);
    }

    public function executeQuery(CategoriesPayload $payload): bool
    {
        $query = $this->createQuery();

        $validate = $this->validator->validate($payload, null, [CategoriesPayload::GROUP_CREATE_CONFIGURATION]);
        if ($validate->count() > 0) {
            throw new ValidationPayloadException($validate);
        }

        $query->setContent($this->serializer->serialize($payload, 'xml', ['groups' => [CategoriesPayload::GROUP_CREATE_CONFIGURATION]]));
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
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('createCategoryConfigurations'),
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
            new GenericErrorResult(400, 'Category ID \d+ of \d+ Empty', 'Add the Category ID for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Category ID \d+ of \d+ exists', 'Correct the Category ID for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Label \d+ of \d+ Empty', 'Add the Label for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Label \d+ of \d+ exist', 'Correct Label for Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Type \d+ of \d+ invalid', 'Correct the type for Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Color \d+ of \d+ invalid', 'Correct the colour for Category x (item) of y (total)'),
            new InternalErrorResult(),
        ];
    }
}
