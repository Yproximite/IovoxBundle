<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

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
 * @see https://docs.iovox.com/display/RA/deleteVoxnumbersFromAccount
 */
class DeleteVoxnumbersFromAccount extends AbstractVoxnumbers implements DeleteVoxnumbersFromAccountInterface
{
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
            self::QUERY_PARAMETER_FULL_VOXNUMBERS => new GenericQueryParameter(self::QUERY_PARAMETER_FULL_VOXNUMBERS, GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all voxnumbers to be removed. These must be in e164 format with no leading zeros or + (e.g. 44207100234 for a London VoxNumber)', true),
            self::QUERY_PARAMETER_RM_IF_IN_USE    => new GenericQueryParameter(self::QUERY_PARAMETER_RM_IF_IN_USE, GenericQueryParameter::TYPE_BOOLEAN, 'If TRUE the VoxNumbers will be removed from any Links if they are attached to. If FALSE a validation message will be thrown if any of the requested VoxNumbers are attached to a Link'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteVoxnumbersFromAccount'),
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
