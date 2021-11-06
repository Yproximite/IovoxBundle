<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumbersPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface UpdateBlockedNumbersInterface extends XmlQueryStringInterface
{
    public function executeQuery(BlockedNumbersPayload $payload): bool;
}
