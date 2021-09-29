<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;

interface UpdateNodesInterface
{
    public function executeQuery(NodesPayload $payload): bool;
}
