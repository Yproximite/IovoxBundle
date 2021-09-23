<?php

namespace Yproximite\IovoxBundle\Exception\Api;

class BadQueryParameterException extends \LogicException
{
    /**
     * @param array<int, string> $availableParameters
     */
    public function __construct(string $parameter, array $availableParameters)
    {
        parent::__construct(sprintf('Query parameter "%s" is not a valid element. Only one of these are available: %s', $parameter, implode(', ', $availableParameters)));
    }
}
