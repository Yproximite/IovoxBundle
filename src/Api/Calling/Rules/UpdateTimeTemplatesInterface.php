<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface UpdateTimeTemplatesInterface extends XmlQueryStringInterface
{
    public function executeQuery(TimeTemplatesPayload $payload): bool;
}
