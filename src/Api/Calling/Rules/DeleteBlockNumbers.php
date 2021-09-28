<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

/**
 * @see https://docs.iovox.com/display/RA/deleteBlockedNumbers
 */
class DeleteBlockNumbers extends AbstractRules
{
    public const QUERY_PARAMETER_TIME_BLOCK_NUMBERS = 'blocked_numbers';

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
            self::QUERY_PARAMETER_TIME_BLOCK_NUMBERS => new GenericQueryParameter(self::QUERY_PARAMETER_TIME_BLOCK_NUMBERS, GenericQueryParameter::TYPE_STRING, 'A comma delimeted list of number;in_or_out;operator of the Blocked Numbers to be deleted', true),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteBlockedNumbers'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new InternalErrorResult(),
        ];
    }
}
