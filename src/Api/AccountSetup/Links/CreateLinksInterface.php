<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

interface CreateLinksInterface
{
    public function executeQuery(LinksPayload $payload): bool;
}
