<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class XmlEmptyErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'XML Empty', 'Add xml to the request body');
    }
}
