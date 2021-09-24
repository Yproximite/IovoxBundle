<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class RequestMethodInvalidErrorResult extends GenericErrorResult
{
    public function __construct(string $method)
    {
        parent::__construct(400, sprintf('Request Method must be %s. \w+ attempted', $method), sprintf('Switch request method x to "%s"', $method));
    }
}
