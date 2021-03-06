<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;

class InvalidQueryParameterException extends \LogicException
{
    public function __construct(mixed $parameterValue, QueryParameterInterface $queryParameter)
    {
        parent::__construct(sprintf('The "%s" value of "%s" query parameter is invalid. Only "%s" type values are accepted.', $parameterValue, $queryParameter->getName(), $queryParameter->getType()));
    }
}
