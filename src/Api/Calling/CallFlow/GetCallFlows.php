<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\LimitIntegerErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\LimitIntervalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\OutputInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\PageIntegerErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\LimitQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\OutputQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\PageQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Model\CallFlow\GetCallFlowsModel;

/**
 * @see https://docs.iovox.com/display/RA/getCallFlows
 */
class GetCallFlows extends AbstractCallFlow
{
    public const QUERY_PARAMETER_ORDER         = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS    = 'req_fields';
    public const QUERY_PARAMETER_TEMPLATE_NAME = 'template_name';
    public const QUERY_PARAMETER_TEMPLATE_TYPE = 'template_type';
    public const QUERY_PARAMETER_ADVANCED      = 'advanced';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCallFlowsModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetCallFlowsModel::create($response->toArray());
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_GET;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            PageQueryParameter::getParameterName()  => new PageQueryParameter(),
            LimitQueryParameter::getParameterName() => new LimitQueryParameter(),
            self::QUERY_PARAMETER_ORDER             => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "c_DESC" will return results ordered by created with the most recent first'),
            self::QUERY_PARAMETER_REQ_FIELDS        => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response.tna=template_name, tno=template_notes, tt=template_type, c=created, a=advanced'),
            self::QUERY_PARAMETER_TEMPLATE_NAME     => new GenericQueryParameter(self::QUERY_PARAMETER_TEMPLATE_NAME, GenericQueryParameter::TYPE_STRING, 'Returns the Call Flow under the given Call Flow title'),
            self::QUERY_PARAMETER_TEMPLATE_TYPE     => new GenericQueryParameter(self::QUERY_PARAMETER_TEMPLATE_TYPE, GenericQueryParameter::TYPE_STRING, 'Specifying DEFAULT returns only default Call Flows, CUSTOM returns only those created by the account holder or ALL returns all Call Flows'),
            self::QUERY_PARAMETER_ADVANCED          => new GenericQueryParameter(self::QUERY_PARAMETER_ADVANCED, GenericQueryParameter::TYPE_STRING, 'Specify YES to return only advanced templates'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getCallFlows'),
            OutputQueryParameter::getParameterName()  => new OutputQueryParameter(),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new PageIntegerErrorResult(),
            new LimitIntegerErrorResult(),
            new LimitIntervalErrorResult(),
            new OutputInvalidErrorResult(),
            new InternalErrorResult(),
        ];
    }
}
