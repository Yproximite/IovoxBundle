<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationPayloadException extends \Exception
{
    /**
     * @param ConstraintViolationListInterface<int, ConstraintViolationInterface> $violationList
     */
    public function __construct(ConstraintViolationListInterface $violationList)
    {
        parent::__construct($violationList->__toString());
    }
}
