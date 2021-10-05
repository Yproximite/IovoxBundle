<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

interface CreateNodeFullInterface
{
    public function executeQuery(NodePayload $payload): bool;

    public function executeXmlStringQuery(string $xmlPayload): bool;
}
