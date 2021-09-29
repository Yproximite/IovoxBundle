<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Analytics\Calls;

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
use Yproximite\IovoxBundle\Model\Call\GetCallMetricsModel;

/**
 * @see https://docs.iovox.com/display/RA/getCallMetrics
 */
class GetCallMetrics extends AbstractCalls implements GetCallMetricsInterface
{
    public function executeQuery(array $queryParameters = []): GetCallMetricsModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetCallMetricsModel::create($response->toArray());
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
            PageQueryParameter::getParameterName()         => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()        => new LimitQueryParameter(),
            self::QUERY_PARAMETER_SDT                      => new GenericQueryParameter(self::QUERY_PARAMETER_SDT, GenericQueryParameter::TYPE_STRING, 'Returns all calls received since a given date. Start date format is YYYY-MM-DD HH:MM:SS with hours, minutes and seconds being optional. Hours, minutes and seconds defaults to 00:00:00'),
            self::QUERY_PARAMETER_EDT                      => new GenericQueryParameter(self::QUERY_PARAMETER_EDT, GenericQueryParameter::TYPE_STRING, 'Returns all calls received before a given date. End date format is YYYY-MM-DD HH:MM:SS with hours, minutes and seconds being optional. Hours, minutes and seconds defaults to 23:59:59'),
            self::QUERY_PARAMETER_NODE_ID                  => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Node ID'),
            self::QUERY_PARAMETER_NODE_TYPE                => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Node Type'),
            self::QUERY_PARAMETER_LINK_ID                  => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Link ID'),
            self::QUERY_PARAMETER_LINK_TYPE                => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Link Type'),
            self::QUERY_PARAMETER_CALL_RES                 => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_RES, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call result, e.g. ANSWERED'),
            self::QUERY_PARAMETER_RULE_RES                 => new GenericQueryParameter(self::QUERY_PARAMETER_RULE_RES, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given rule result, e.g. Call to an Operator'),
            self::QUERY_PARAMETER_CALL_ORIGIN              => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_ORIGIN, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call origin, e.g. 447966111222'),
            self::QUERY_PARAMETER_CALL_ORIGIN_ENCRYPTION   => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_ORIGIN_ENCRYPTION, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call origin encrypted, e.g. 4478_516CD74E0509B222'),
            self::QUERY_PARAMETER_VOXNUMBER                => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given VoxNumber, e.g. 448456111222'),
            self::QUERY_PARAMETER_CALL_DEST                => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_DEST, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call destination, e.g. 447966123456'),
            self::QUERY_PARAMETER_CTYPE                    => new GenericQueryParameter(self::QUERY_PARAMETER_CTYPE, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call type, e.g. DIRECT or API'),
            self::QUERY_PARAMETER_DETAIL                   => new GenericQueryParameter(self::QUERY_PARAMETER_DETAIL, GenericQueryParameter::TYPE_STRING, 'Returns all data for the given detail. This includes IP Address (for makeTwoWayCall) and conference room number'),
            self::QUERY_PARAMETER_CAT_IDS                  => new GenericQueryParameter(self::QUERY_PARAMETER_CAT_IDS, GenericQueryParameter::TYPE_STRING, '	Returns all data for the given category IDs. To produce an AND based search separate each by a comma and to produce an OR based, separate as array elements. For example, cat_ids[]=1,2&cat_ids[]=3,4 would search where category ID is (1 AND 2) OR (3 AND 4). Note: if a search is made for Category ID 5, potentially Location = London, results will include any items further down the tree, such as Notting Hill'),
            self::QUERY_PARAMETER_REQ_FIELDS               => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated metrics to return in response. tc=Total Calls, acpd=Average Calls Per Day, tct=Formatted Total Call Time (00:00:00), tcts=Total Call Time in Seconds, act=Formatted Average all Time (00:00:00), acts=Average Call Time in seconds, ttt=Formatted Total Talk Time (00:00:00), ttts=Total Talk Time in Seconds, att=Formatted Average Talk Time (00:00:00), atts=Average Talk Time in Seconds, tuc=Total Unique Callers, tun=Total Unique Nodes, tul=Total Unique Links'),
            self::QUERY_PARAMETER_GROUP_FIELDS             => new GenericQueryParameter(self::QUERY_PARAMETER_GROUP_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated abbreviations of up to 2 fields to group the result set by. These will be appended to the req_fields list. cdate = Call Date, cweekd=Call Weekday, cmonth=Month of Call, co=Call Origin, coe=Call Origin Encrypted , vn=VoxNumber, cd=Call Destination, detail=IP Address/Conference ID, call_res=Call Result, nid=Node ID, ntype=Node Type, lid=Link ID, lname=Link Name, ltype=Link Type'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getCallMetrics'),
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
