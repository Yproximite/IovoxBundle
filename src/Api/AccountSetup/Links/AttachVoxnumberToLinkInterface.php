<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachVoxnumberToLinkPayload;

interface AttachVoxnumberToLinkInterface
{
    public function executeQuery(AttachVoxnumberToLinkPayload $payload): bool;
}
