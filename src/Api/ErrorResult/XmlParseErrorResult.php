<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class XmlParseErrorResult extends GenericErrorResult
{
    public function __construct()
    {
        parent::__construct(400, 'XML parse error. \w+ at line \d+, column \d+', 'Correct XML at point x on line y, column z');
    }
}
