<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveCategoryFromLinkPayload;

interface RemoveCategoryFromLinkInterface
{
    public function executeQuery(RemoveCategoryFromLinkPayload $payload): bool;
}
