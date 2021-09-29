<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Model\Nodes\GetNodesModel;

interface GetNodesInterface
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
     * @param array{ page?: positive-int, limit?: positive-int, node_id?: non-empty-string, node_type?: non-empty-string, link_id?: non-empty-string, link_type?: non-empty-string, voxnumber?: non-empty-string, req_fields?: non-empty-string, rule_name?: non-empty-string, order?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetNodesModel;
}
