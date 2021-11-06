<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

interface XmlQueryStringInterface
{
    /**
     * @throws BadResponseReturnException
     */
    public function executeXmlStringQuery(string $xmlPayload): bool;
}
