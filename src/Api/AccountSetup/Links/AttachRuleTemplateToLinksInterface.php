<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;

interface AttachRuleTemplateToLinksInterface
{
    public function executeQuery(AttachRuleTemplateToLinksPayload $payload): bool;
}
