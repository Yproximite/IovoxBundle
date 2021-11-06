<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface CreateNodeFullInterface extends XmlQueryStringInterface
{
    public function executeQuery(NodePayload $payload): bool;
}
