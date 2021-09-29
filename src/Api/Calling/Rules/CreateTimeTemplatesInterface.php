<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;

interface CreateTimeTemplatesInterface
{
    public function executeQuery(TimeTemplatesPayload $payload): bool;
}
