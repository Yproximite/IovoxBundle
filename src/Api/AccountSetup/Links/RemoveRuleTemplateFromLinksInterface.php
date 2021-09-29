<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveRuleTemplateFromLinksPayload;

interface RemoveRuleTemplateFromLinksInterface
{
    public function executeQuery(RemoveRuleTemplateFromLinksPayload $payload): bool;
}
