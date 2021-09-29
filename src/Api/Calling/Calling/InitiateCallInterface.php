<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Calling;

interface InitiateCallInterface
{
    /**
     * @param array<int|string, mixed> $payload
     */
    public function executeQuery(array $payload): bool;
}
