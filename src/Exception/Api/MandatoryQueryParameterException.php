<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;

class MandatoryQueryParameterException extends \LogicException
{
    public function __construct(QueryParameterInterface $queryParameter)
    {
        parent::__construct(sprintf('Query parameter "%s" is mandatory. You should provide a value of type "%s".', $queryParameter->getName(), $queryParameter->getType()));
    }
}
