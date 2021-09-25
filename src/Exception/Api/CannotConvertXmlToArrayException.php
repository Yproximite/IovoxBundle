<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;


class CannotConvertXmlToArrayException extends \Exception
{
    public function __construct(string $response)
    {
        parent::__construct(sprintf('Cannot convert response "%s" to array.', $response));
    }
}
