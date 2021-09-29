<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachCategoryToLinkPayload;

interface AttachCategoryToLinkInterface
{
    public function executeQuery(AttachCategoryToLinkPayload $payload): bool;
}
