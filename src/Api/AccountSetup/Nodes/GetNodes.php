<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\GenericErrorResult;
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
use Yproximite\IovoxBundle\Model\Nodes\GetNodesModel;

/**
 * @see https://docs.iovox.com/display/RA/getNodes
 */
class GetNodes extends AbstractNodes
{
    public const QUERY_PARAMETER_NODE_ID    = 'node_id';
    public const QUERY_PARAMETER_NODE_TYPE  = 'node_type';
    public const QUERY_PARAMETER_LINK_ID    = 'link_id';
    public const QUERY_PARAMETER_LINK_TYPE  = 'link_type';
    public const QUERY_PARAMETER_VOXNUMBER  = 'voxnumber';
    public const QUERY_PARAMETER_REQ_FIELDS = 'req_fields';
    public const QUERY_PARAMETER_RULE_NAME  = 'rule_name';
    public const QUERY_PARAMETER_ORDER      = 'order';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetNodesModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetNodesModel::create($response->toArray());
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
            static::QUERY_PARAMETER_NODE_ID         => new GenericQueryParameter(static::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns the specified Node ID'),
            static::QUERY_PARAMETER_NODE_TYPE       => new GenericQueryParameter(static::QUERY_PARAMETER_NODE_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all nodes for the specified Node Type'),
            static::QUERY_PARAMETER_LINK_ID         => new GenericQueryParameter(static::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns the node for the specified Link ID'),
            static::QUERY_PARAMETER_LINK_TYPE       => new GenericQueryParameter(static::QUERY_PARAMETER_LINK_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all nodes for the specified Link Type'),
            static::QUERY_PARAMETER_VOXNUMBER       => new GenericQueryParameter(static::QUERY_PARAMETER_VOXNUMBER, GenericQueryParameter::TYPE_STRING, 'Returns all nodes for the specified VoxNumber'),
            static::QUERY_PARAMETER_REQ_FIELDS      => new GenericQueryParameter(static::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response. nid=Node id, nn= Node Name,  nt= Node Type, lid = Link Id, ln = Link Name, lt = Link Type, rtn=Rule Template Name.'),
            static::QUERY_PARAMETER_RULE_NAME       => new GenericQueryParameter(static::QUERY_PARAMETER_RULE_NAME, GenericQueryParameter::TYPE_STRING, 'Returns all nodes that have the specified rule name'),
            static::QUERY_PARAMETER_ORDER           => new GenericQueryParameter(static::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "nd_DESC" will return results ordered by order_date with the most recent first'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getNodes'),
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
            new GenericErrorResult(400, 'Order Field Invalid', 'Correct order parameter'),
            new OutputInvalidErrorResult(),
            new InternalErrorResult(),
        ];
    }
}
