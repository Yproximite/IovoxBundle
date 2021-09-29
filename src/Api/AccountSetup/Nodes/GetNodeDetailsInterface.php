<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Model\Nodes\GetNodeDetailsModel;

interface GetNodeDetailsInterface
{
    public const QUERY_PARAMETER_NODE_ID          = 'node_id';
    public const QUERY_PARAMETER_LINK_ID          = 'link_id';
    public const QUERY_PARAMETER_REQ_FIELDS       = 'req_fields';
    public const QUERY_PARAMETER_ORDER            = 'order';
    public const QUERY_PARAMETER_RETURN_RULE_NAME = 'return_rule_name';
    public const QUERY_PARAMETER_RETURN_VOXNUMBER = 'return_voxnumber';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, node_id: non-empty-string, link_id?: non-empty-string, req_fields?: non-empty-string, return_rule_name?: non-empty-string, return_voxnumber?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetNodeDetailsModel;
}
