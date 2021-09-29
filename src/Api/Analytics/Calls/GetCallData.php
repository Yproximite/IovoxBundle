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
use Yproximite\IovoxBundle\Model\Call\GetCallDataModel;

/**
 * @see https://docs.iovox.com/display/RA/getCallData
 */
class GetCallData extends AbstractCalls implements GetCallDataInterface
{
    public function executeQuery(array $queryParameters = []): GetCallDataModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetCallDataModel::create($response->toArray());
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
            PageQueryParameter::getParameterName()      => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()     => new LimitQueryParameter(),
            self::QUERY_PARAMETER_ORDER                 => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list (exclusive of cat_v, cat_lbl and cat_id) and suffix with ASC or DESC for ascending or descending respectively. For example, "cs_DESC" will return results ordered by call_start with the most recent first.'),
            self::QUERY_PARAMETER_SDT                   => new GenericQueryParameter(self::QUERY_PARAMETER_SDT, GenericQueryParameter::TYPE_STRING, 'Returns all calls received since a given date. Start date format is YYYY-MM-DD HH:MM:SS with hours, minutes and seconds being optional. Hours, minutes and seconds defaults to 00:00:00'),
            self::QUERY_PARAMETER_EDT                   => new GenericQueryParameter(self::QUERY_PARAMETER_EDT, GenericQueryParameter::TYPE_STRING, 'Returns all calls received before a given date. End date format is YYYY-MM-DD HH:MM:SS with hours, minutes and seconds being optional. Hours, minutes and seconds defaults to 23:59:59'),
            self::QUERY_PARAMETER_DCONST                => new GenericQueryParameter(self::QUERY_PARAMETER_DCONST, GenericQueryParameter::TYPE_STRING, "Shortcut to request calls received on a particular date
YESTERDAY : Return yesterday's calls, from 00:00:00 to 23:59:59"),
            self::QUERY_PARAMETER_ID                  => new GenericQueryParameter(self::QUERY_PARAMETER_ID, GenericQueryParameter::TYPE_STRING, 'Returns the Call with the specified Call ID'),
            self::QUERY_PARAMETER_NODE_ID             => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_ID, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Node ID'),
            self::QUERY_PARAMETER_NODE_TYPE           => new GenericQueryParameter(self::QUERY_PARAMETER_NODE_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Node Type'),
            self::QUERY_PARAMETER_LINK_ID             => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_ID, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Link ID'),
            self::QUERY_PARAMETER_LINK_TYPE           => new GenericQueryParameter(self::QUERY_PARAMETER_LINK_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns all calls for the specified Link Type'),
            self::QUERY_PARAMETER_CTYPE               => new GenericQueryParameter(self::QUERY_PARAMETER_CTYPE, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call type, e.g. DIRECT or API'),
            self::QUERY_PARAMETER_CALL_RES            => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_RES, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call result, e.g. ANSWERED'),
            self::QUERY_PARAMETER_RULE_RES            => new GenericQueryParameter(self::QUERY_PARAMETER_RULE_RES, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given rule result, e.g. Call to an Operator'),
            self::QUERY_PARAMETER_CALL_ORIGIN         => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_ORIGIN, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call origin, e.g. 447966111222'),
            self::QUERY_PARAMETER_CALL_ORIGIN_ENCODED => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_ORIGIN_ENCODED, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call origin encoded, the 4 first digits are not encoded (country code and area code)
e.g. 44798833057321'),
            self::QUERY_PARAMETER_VOXNUMBER           => new GenericQueryParameter(self::QUERY_PARAMETER_VOXNUMBER, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given VoxNumber, e.g. 448456111222'),
            self::QUERY_PARAMETER_CALL_DEST           => new GenericQueryParameter(self::QUERY_PARAMETER_CALL_DEST, GenericQueryParameter::TYPE_STRING, 'Returns all data under the given call destination, e.g. 447966123456'),
            self::QUERY_PARAMETER_DIRECTION           => new GenericQueryParameter(self::QUERY_PARAMETER_DIRECTION, GenericQueryParameter::TYPE_STRING, '	Returns all data under the given direction e.g. IN'),
            self::QUERY_PARAMETER_DETAIL              => new GenericQueryParameter(self::QUERY_PARAMETER_DETAIL, GenericQueryParameter::TYPE_STRING, 'Returns all data for the given detail. This includes IP Address (for makeTwoWayCall) and conference room number'),
            self::QUERY_PARAMETER_CAT_IDS             => new GenericQueryParameter(self::QUERY_PARAMETER_CAT_IDS, GenericQueryParameter::TYPE_STRING, 'Returns all data for the given category IDs. To produce an AND based search separate each by a comma and to produce an OR based, separate as array elements. For example, cat_ids[]=1,2&cat_ids[]=3,4 would search where category ID is (1 AND 2) OR (3 AND 4). Note: if a search is made for Category ID 5, potentially Location = London, results will include any items further down the tree, such as Notting Hill'),
            self::QUERY_PARAMETER_REQ_FIELDS          => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response.
id=id
cs=Call Start
ce=Call End
co=Call Origin
coe=Call Origin Encoded
col= Call Origin Location
vn=VoxNumber
cd=Call Destination
detail=IP Address/Conference ID
ct=Formatted Call Time (00:00:00)
cts=Call Time in Seconds
tt=Formated Talk Time (00:00:00)
tts=Talk Time in Seconds
ctype=Call Type
call_res=Call Result
rule_res=Rule Result
nid=Node ID
nname=Node Name
ntype=Node Type
lid=Link ID
lname=Link Name
ltype=Link Type
has_rec=Has Recording
es=Email Sent
cat_id=Link Category ID
cat_lbl=Link Category Label
cat_v=Link Category Value
call_cat_id=Call Category ID
call_cat_lbl=Call Category Label
call_cat_v=Call Category Value
node_cat_id=Node Category ID
node_cat_lbl=Node Category Label
node_cat_v=Node Category Value
contact_cat_id=Contact Category ID
contact_cat_lbl=Contact Category ID
contact_cat_v=Contact Category ID
direction=Direction'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getCallData'),
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
