<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
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
use Yproximite\IovoxBundle\Api\XmlStringQueryTrait;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Exception\Api\ValidationPayloadException;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;

/**
 * @see https://docs.iovox.com/display/RA/createCategories
 */
class CreateCategories extends AbstractCategories implements CreateCategoriesInterface
{
    use XmlStringQueryTrait;

    public const EXPECTED_RESPONSE_STATUS_CODE = Response::HTTP_CREATED;

    public function __construct(protected Client $client, protected IovoxSerializer $serializer, protected ValidatorInterface $validator)
    {
        parent::__construct($client);
    }

    public function executeQuery(CategoriesPayload $payload): bool
    {
        $query = $this->createQuery();

        $validate = $this->validator->validate($payload, null, [CategoriesPayload::GROUP_CREATE]);
        if ($validate->count() > 0) {
            throw new ValidationPayloadException($validate);
        }

        $query->setContent($this->serializer->serialize($payload, 'xml', ['groups' => [CategoriesPayload::GROUP_CREATE]]));
        $response = $this->client->executeQuery($query);

        if (self::EXPECTED_RESPONSE_STATUS_CODE === $response->getStatusCode()) {
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
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('createCategories'),
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
            new GenericErrorResult(400, 'Category ID \d+ of \d+ already exist', 'Correct the Category ID for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Parent ID \d+ of \d+ Empty', 'Add the Parent ID for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Parent ID \d+ of \d+ does not exist', 'Correct the Parent ID for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Label \d+ of \d+ Empty', 'Add the Label for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Label \d+ of \d+ does not exist', 'Correct the Label for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Value \d+ of \d+ Empty', 'Add the Value for the Category x (item) of y (total)'),
            new GenericErrorResult(400, 'Value \d+ of \d+ Empty', 'Add the Value for the Category x (item) of y (total)'),
            new InternalErrorResult(),
        ];
    }
}
