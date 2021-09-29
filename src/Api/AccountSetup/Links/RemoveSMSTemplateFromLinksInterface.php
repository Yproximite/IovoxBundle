<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveSMSTemplateFromLinksPayload;

interface RemoveSMSTemplateFromLinksInterface
{
    public function executeQuery(RemoveSMSTemplateFromLinksPayload $payload): bool;
}
