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
 * @see https://docs.iovox.com/display/RA/deleteCategoryConfigurations
 */
class DeleteCategoryConfigurations extends AbstractCategories
{
    public const QUERY_PARAMETER_CATEGORIES_IDS = 'categories_ids';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool
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
            static::QUERY_PARAMETER_CATEGORIES_IDS => new GenericQueryParameter(static::QUERY_PARAMETER_CATEGORIES_IDS, GenericQueryParameter::TYPE_STRING, 'A comma delimeted list of all categories configuration IDs to be deleted', true),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteCategoryConfigurations'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new GenericErrorResult(400, 'Category ID \d+ of \d+ does not exist', 'Correct categories x (item) of y (total)'),
            new GenericErrorResult(400, 'Category ID \d+ of \d+ is empty', 'Correct categories x (item) of y (total)'),
            new InternalErrorResult(),
        ];
    }
}
