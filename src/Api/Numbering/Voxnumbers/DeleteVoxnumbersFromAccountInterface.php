<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

use Yproximite\IovoxBundle\Enum\BooleanString;

interface DeleteVoxnumbersFromAccountInterface
{
    public const QUERY_PARAMETER_FULL_VOXNUMBERS = 'full_voxnumbers';
    public const QUERY_PARAMETER_RM_IF_IN_USE    = 'rm_if_in_use';

    /**
     * @param array{ full_voxnumbers: non-empty-string, rm_if_in_use?: BooleanString::* } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
