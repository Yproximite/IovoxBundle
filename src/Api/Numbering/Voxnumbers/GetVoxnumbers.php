<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

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
use Yproximite\IovoxBundle\Model\Voxnumbers\GetVoxnumbersModel;

/**
 * @see https://docs.iovox.com/display/RA/getVoxnumbers
 */
class GetVoxnumbers extends AbstractVoxnumbers implements GetVoxnumbersInterface
{
    public function executeQuery(array $queryParameters = []): GetVoxnumbersModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetVoxnumbersModel::create($response->toArray());
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
            PageQueryParameter::getParameterName()    => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()   => new LimitQueryParameter(),
            self::QUERY_PARAMETER_REQ_FIELDS          => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response. nid=Node ID, nname=Node Name, lid=Link ID, lname=Link Name, as=Assigned Status, cs=Call Status, vn=VoxNumber, vnt=VoxNumber Type, vnco=VoxNumber Country, vnci=VoxNumber City, vnpd=VoxNumber Purchase Date'),
            self::QUERY_PARAMETER_ORDER               => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "vnpd_DESC" will return results ordered by VoxNumber Purchase Date with the most recent first'),
            self::QUERY_PARAMETER_VOXNUMBER           => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER, GenericQueryParameter::TYPE_STRING, 'Returns VoxNumber details under the specified VoxNumber (this must be internationalised e.g. 442012344321)'),
            self::QUERY_PARAMETER_VOXNUMBER_TYPE      => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all VoxNumbers under the specified VoxNumber Type: LOCAL, NATIONAL'),
            self::QUERY_PARAMETER_VOXNUMBER_COUNTRY   => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER_COUNTRY, GenericQueryParameter::TYPE_STRING, 'Returns all VoxNumbers in the specified country'),
            self::QUERY_PARAMETER_VOXNUMBER_CITY      => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER_CITY, GenericQueryParameter::TYPE_STRING, 'Returns all VoxNumbers in the specified city'),
            self::QUERY_PARAMETER_ASSIGNED_STATUS     => new GenericQueryParameter(self::QUERY_PARAMETER_ASSIGNED_STATUS, GenericQueryParameter::TYPE_STRING, 'Returns all VoxNumbers based on the specified assigned status, i.e. whether or not it is assigned to a link: ASSIGNED or UNASSIGNED'),
            self::QUERY_PARAMETER_CALL_STATUS         => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_STATUS, GenericQueryParameter::TYPE_STRING, 'Returns all VoxNumbers based on the specified call status. The valid search criteria here are:
ON - All VoxNumbers that are switched on, including ON (Active) and ON (No Rules)
NO RULES - All VoxNumbers with call_status ON (No Rules). This will automatically switch to ON (Active) when a rule template is applied
ACTIVE - All VoxNumbers with call_status ON (Active). This will automatically switch to ON (No Rules) when a rule template is removed
OFF - All VoxNumbers with call_status OFF (On Hold). This will stay as OFF until the VoxNumber call_status is set to ON, even when Rule Templates are attached or removed'),
            self::QUERY_PARAMETER_NODE_ID           => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns the VoxNumber attached to the specified Node ID'),
            self::QUERY_PARAMETER_LINK_ID           => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns the VoxNumber attached to the specified Link ID'),
            self::QUERY_PARAMETER_CAT_IDS           => new GenericQueryParameter(self::QUERY_PARAMETER_CAT_IDS, GenericQueryParameter::TYPE_ARRAY, 'Returns all data for the given category IDs. To produce an AND based search separate each by a comma and to produce an OR based, separate as array elements. For example, cat_ids[]=1,2&cat_ids[]=3,4 would search where category ID is (1 AND 2) OR (3 AND 4). Note: if a search is made for Category ID 5, potentially Location = London, results will include any items further down the tree, such as Notting Hill'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getVoxnumbers'),
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
