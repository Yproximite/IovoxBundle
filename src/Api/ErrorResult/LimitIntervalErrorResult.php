<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class LimitIntervalErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'Limit must be between 1 and 20000', 'Correct the limit parameter');
    }
}
