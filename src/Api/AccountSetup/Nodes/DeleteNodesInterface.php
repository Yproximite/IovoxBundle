<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

interface DeleteNodesInterface
{
    public const QUERY_PARAMETER_NODE_IDS = 'node_ids';

    /**
     * @param array{ node_ids: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
