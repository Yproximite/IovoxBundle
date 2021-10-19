<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

interface CreateCallFlowInterface
{
    /**
     * @param array<int|string, mixed> $payload
     */
    public function executeQuery(array $payload): bool;

    public function executeXmlStringQuery(string $xmlPayload): bool;
}
