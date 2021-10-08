<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Model\Links\GetLinksModel;

interface GetLinksInterface
{
    public const QUERY_PARAMETER_NODE_ID    = 'node_id';
    public const QUERY_PARAMETER_NODE_TYPE  = 'node_type';
    public const QUERY_PARAMETER_LINK_ID    = 'link_id';
    public const QUERY_PARAMETER_LINK_TYPE  = 'link_type';
    public const QUERY_PARAMETER_REQ_FIELDS = 'req_fields';
    public const QUERY_PARAMETER_ORDER      = 'order';
    public const QUERY_PARAMETER_CAT_IDS    = 'cat_ids';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, node_id?: non-empty-string, node_type?: non-empty-string, link_id?: non-empty-string, link_type?: non-empty-string, req_fields?: non-empty-string, order?: non-empty-string, cat_ids?: array<int|string, mixed> } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetLinksModel;
}
