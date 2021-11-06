<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface CreateCallFlowInterface extends XmlQueryStringInterface
{
    /**
     * @param array<int|string, mixed> $payload
     */
    public function executeQuery(array $payload): bool;
}
