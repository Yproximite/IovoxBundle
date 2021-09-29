<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;

interface AttachSMSTemplateToLinksInterface
{
    public function executeQuery(AttachSMSTemplateToLinksPayload $payload): bool;
}
