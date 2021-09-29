<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Analytics\Calls;

use Yproximite\IovoxBundle\Model\Call\GetCallMetricsModel;

interface GetCallMetricsInterface
{
    public const QUERY_PARAMETER_SDT                    = 'sdt';
    public const QUERY_PARAMETER_EDT                    = 'edt';
    public const QUERY_PARAMETER_NODE_ID                = 'node_id';
    public const QUERY_PARAMETER_NODE_TYPE              = 'node_type';
    public const QUERY_PARAMETER_LINK_ID                = 'link_id';
    public const QUERY_PARAMETER_LINK_TYPE              = 'link_type';
    public const QUERY_PARAMETER_CALL_RES               = 'call_res';
    public const QUERY_PARAMETER_RULE_RES               = 'rule_res';
    public const QUERY_PARAMETER_CALL_ORIGIN            = 'call_origin';
    public const QUERY_PARAMETER_CALL_ORIGIN_ENCRYPTION = 'call_origin_encryption';
    public const QUERY_PARAMETER_VOXNUMBER              = 'voxnumber';
    public const QUERY_PARAMETER_CALL_DEST              = 'call_dest';
    public const QUERY_PARAMETER_CTYPE                  = 'ctype';
    public const QUERY_PARAMETER_DETAIL                 = 'detail';
    public const QUERY_PARAMETER_CAT_IDS                = 'cat_ids';
    public const QUERY_PARAMETER_REQ_FIELDS             = 'req_fields';
    public const QUERY_PARAMETER_GROUP_FIELDS           = 'group_fields';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, sdt?: non-empty-string, edt?: non-empty-string, node_id?:non-empty-string, node_type?: non-empty-string, link_id?: non-empty-string, link_type?: non-empty-string, ctype?: non-empty-string, call_res?: non-empty-string, rule_res?:non-empty-string, call_origin?: non-empty-string, call_origin_encryption?: non-empty-string, voxnumber?: non-empty-string, call_dest?: non-empty-string, detail?: non-empty-string, cat_ids?: non-empty-string, req_fields?: non-empty-string, group_fields?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCallMetricsModel;
}
