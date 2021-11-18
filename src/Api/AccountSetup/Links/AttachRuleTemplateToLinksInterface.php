<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface AttachRuleTemplateToLinksInterface extends XmlQueryStringInterface
{
    public function executeQuery(AttachRuleTemplateToLinksPayload $payload): bool;
}
