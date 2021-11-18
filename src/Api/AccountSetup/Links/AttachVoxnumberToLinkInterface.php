<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachVoxnumberToLinkPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface AttachVoxnumberToLinkInterface extends XmlQueryStringInterface
{
    public function executeQuery(AttachVoxnumberToLinkPayload $payload): bool;
}
