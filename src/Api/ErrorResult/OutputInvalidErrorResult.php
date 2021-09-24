<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class OutputInvalidErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'Output Type Invalid', 'Correct output parameter');
    }
}
