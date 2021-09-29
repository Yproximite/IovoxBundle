<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

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
use Yproximite\IovoxBundle\Model\Links\GetLinksModel;

/**
 * @see https://docs.iovox.com/display/RA/getLinks
 */
class GetLinks extends AbstractLinks implements GetLinksInterface
{
    public function executeQuery(array $queryParameters = []): GetLinksModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetLinksModel::create($response->toArray());
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
            self::QUERY_PARAMETER_NODE_ID           => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns all links for the specified Node ID'),
            self::QUERY_PARAMETER_NODE_TYPE         => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all links for the specified Node Type'),
            self::QUERY_PARAMETER_LINK_ID           => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns the link for the specified Link ID'),
            self::QUERY_PARAMETER_LINK_TYPE         => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all links for the specified Link Type'),
            self::QUERY_PARAMETER_REQ_FIELDS        => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, '	Comma separated list of abbreviated fields to return in response. nid=Node id, nn= Node Name,  nt= Node Type, lid = Link Id, ln = Link Name, lt = Link Type,vn = VoxNumber, rn = Rule Name.'),
            self::QUERY_PARAMETER_ORDER             => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "nn_DESC" will return results ordered by order_date with the most recent first'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getLinks'),
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
