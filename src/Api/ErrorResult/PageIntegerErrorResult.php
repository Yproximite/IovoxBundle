<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class PageIntegerErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'Page Number not an integer', 'Remove non-numerics from page');
    }
}
