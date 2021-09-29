<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveVoxnumberFromLinkPayload;

interface RemoveVoxnumberFromLinkInterface
{
    public function executeQuery(RemoveVoxnumberFromLinkPayload $payload): bool;
}
