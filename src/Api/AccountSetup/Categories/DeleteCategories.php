<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\GenericErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

/**
 * @see https://docs.iovox.com/display/RA/deleteCategories
 */
class DeleteCategories extends AbstractCategories implements DeleteCategoriesInterface
{
    public function executeQuery(array $queryParameters): bool
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_NO_CONTENT === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_DELETE;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            self::QUERY_PARAMETER_CATEGORIES => new GenericQueryParameter(self::QUERY_PARAMETER_CATEGORIES, GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all category label and id combinations of the categories to be deleted. Category label and id should be separated by a semi-colon. e.g. Location;Cambridge,Location;London', true),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteCategories'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new GenericErrorResult(400, 'Category ID \d+ of \d+ does not exist', 'Correct category_id x (item) of y (total)'),
            new GenericErrorResult(400, 'Category ID \d+ of \d+ Empty', 'Correct category_id x (item) of y (total)'),
            new GenericErrorResult(400, 'Category IDs Empty', 'Add one or more categories to the request'),
            new InternalErrorResult(),
        ];
    }
}
