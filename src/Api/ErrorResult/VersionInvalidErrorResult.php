<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class VersionInvalidErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'API Version Invalid', 'Correct v parameter');
    }
}
