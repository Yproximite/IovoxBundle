<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface UpdateNodesInterface extends XmlQueryStringInterface
{
    public function executeQuery(NodesPayload $payload): bool;
}
