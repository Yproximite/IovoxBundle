<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

use Yproximite\IovoxBundle\Model\Voxnumbers\GetVoxnumbersModel;

interface GetVoxnumbersInterface
{
    public const QUERY_PARAMETER_REQ_FIELDS        = 'req_fields';
    public const QUERY_PARAMETER_ORDER             = 'order';
    public const QUERY_PARAMETER_VOXNUMBER         = 'voxnumber';
    public const QUERY_PARAMETER_VOXNUMBER_TYPE    = 'voxnumber_type';
    public const QUERY_PARAMETER_VOXNUMBER_COUNTRY = 'voxnumber_country';
    public const QUERY_PARAMETER_VOXNUMBER_CITY    = 'voxnumber_city';
    public const QUERY_PARAMETER_ASSIGNED_STATUS   = 'assigned_status';
    public const QUERY_PARAMETER_CALL_STATUS       = 'call_status';
    public const QUERY_PARAMETER_NODE_ID           = 'node_id';
    public const QUERY_PARAMETER_LINK_ID           = 'link_id';
    public const QUERY_PARAMETER_CAT_IDS           = 'cat_ids';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, req_fields?: non-empty-string, order?: non-empty-string, voxnumber?: non-empty-string, voxnumber_type?: non-empty-string, voxnumber_country?: non-empty-string, voxnumber_city?: non-empty-string, assigned_status?: non-empty-string, call_status?: non-empty-string, node_id?: non-empty-string, link_id?: non-empty-string, cat_ids?: array<int|string, mixed> } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetVoxnumbersModel;
}
