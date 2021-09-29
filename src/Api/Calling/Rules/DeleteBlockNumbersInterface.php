<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

interface DeleteBlockNumbersInterface
{
    public const QUERY_PARAMETER_TIME_BLOCK_NUMBERS = 'blocked_numbers';

    /**
     * @param array{ blocked_numbers: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
