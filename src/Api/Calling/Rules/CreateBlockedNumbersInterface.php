<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumbersPayload;

interface CreateBlockedNumbersInterface
{
    public function executeQuery(BlockedNumbersPayload $payload): bool;
}
