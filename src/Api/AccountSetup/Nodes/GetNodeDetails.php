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
use Yproximite\IovoxBundle\Model\Nodes\GetNodeDetailsModel;

/**
 * @see https://docs.iovox.com/display/RA/getNodeDetails
 */
class GetNodeDetails extends AbstractNodes implements GetNodeDetailsInterface
{
    public function executeQuery(array $queryParameters = []): GetNodeDetailsModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetNodeDetailsModel::create($response->toArray());
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
            PageQueryParameter::getParameterName()   => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()  => new LimitQueryParameter(),
            self::QUERY_PARAMETER_NODE_ID            => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns the specified Node ID', true),
            self::QUERY_PARAMETER_LINK_ID            => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns the node for the specified Link ID'),
            self::QUERY_PARAMETER_REQ_FIELDS         => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response. nid=Node id, nn= Node Name, nt= Node Type, nd = ??, lid = Link Id, ln = Link Name, lt = Link Type, ld = ??, vn = VoxNumber, cid = Category Id, cl = Category Label , cv = Category Value.'),
            self::QUERY_PARAMETER_ORDER              => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "nd_DESC" will return results ordered by order_date with the most recent first'),
            self::QUERY_PARAMETER_RETURN_RULE_NAME   => new GenericQueryParameter(self::QUERY_PARAMETER_RETURN_RULE_NAME, GenericQueryParameter::TYPE_STRING, 'Returns the rule name for the specified Node. Can be true / false'),
            self::QUERY_PARAMETER_RETURN_VOXNUMBER   => new GenericQueryParameter(self::QUERY_PARAMETER_RETURN_VOXNUMBER, GenericQueryParameter::TYPE_STRING, 'Returns the VoxNumber used for the specified Node. Can be true / false'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getNodeDetails'),
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
            new GenericErrorResult(400, 'Required Fields Invalid: id,cs', 'Correct the req_fields parameter.'),
            new GenericErrorResult(400, 'Node ID Doesn\'t exist', 'Correct Node ID parameter'),
            new OutputInvalidErrorResult(),
            new InternalErrorResult(),
        ];
    }
}
