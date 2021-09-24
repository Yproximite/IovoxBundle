<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class VersionEmptyErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'API Version Empty', 'Add a value for the v parameter in the query string');
    }
}
