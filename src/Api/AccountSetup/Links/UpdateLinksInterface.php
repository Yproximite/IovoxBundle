<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface UpdateLinksInterface extends XmlQueryStringInterface
{
    public function executeQuery(LinksPayload $payload): bool;
}
