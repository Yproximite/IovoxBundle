<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class LimitIntegerErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'Limit not an integer', 'Remove non-numerics from limit');
    }
}
