<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class RequestEmptyErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'Request Empty', 'Add at least one contact to the request');
    }
}
