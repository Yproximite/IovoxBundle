<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;

interface CreateNodesInterface
{
    public function executeQuery(NodesPayload $payload): bool;
}
