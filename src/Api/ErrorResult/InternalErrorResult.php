<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class InternalErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(500, 'Internal Server Error', 'Retry later');
    }
}
