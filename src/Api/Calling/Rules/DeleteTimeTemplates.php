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
 * @see https://docs.iovox.com/display/RA/deleteTimeTemplates
 */
class DeleteTimeTemplates extends AbstractRules
{
    public const QUERY_PARAMETER_TIME_TEMPLATE_LABELS = 'time_template_labels';
    public const QUERY_PARAMETER_FORCE                = 'force';

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
            self::QUERY_PARAMETER_TIME_TEMPLATE_LABELS => new GenericQueryParameter(self::QUERY_PARAMETER_TIME_TEMPLATE_LABELS, GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all Time Template labels of the Time Template to be deleted', true),
            self::QUERY_PARAMETER_FORCE                => new GenericQueryParameter(self::QUERY_PARAMETER_FORCE, GenericQueryParameter::TYPE_BOOLEAN, 'TRUE/FALSE. If set to TRUE and the Time Template is used by a blocking rules, it will also remove the template from the rule. If set to FALSE and the Time Template is used by a blocking rules, an error will be thrown'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteTimeTemplates'),
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
