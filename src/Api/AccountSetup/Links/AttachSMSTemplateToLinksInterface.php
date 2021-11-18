<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface AttachSMSTemplateToLinksInterface extends XmlQueryStringInterface
{
    public function executeQuery(AttachSMSTemplateToLinksPayload $payload): bool;
}
