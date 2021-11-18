<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachCategoryToLinkPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface AttachCategoryToLinkInterface extends XmlQueryStringInterface
{
    public function executeQuery(AttachCategoryToLinkPayload $payload): bool;
}
