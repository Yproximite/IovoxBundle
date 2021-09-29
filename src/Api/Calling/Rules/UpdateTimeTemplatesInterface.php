<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;

interface UpdateTimeTemplatesInterface
{
    public function executeQuery(TimeTemplatesPayload $payload): bool;
}
