<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Model\Rules\GetBlockedNumbersModel;

interface GetBlockedNumbersInterface
{
    public const QUERY_PARAMETER_NUMBER     = 'number';
    public const QUERY_PARAMETER_OPERATOR   = 'operator';
    public const QUERY_PARAMETER_IN_OR_OUT  = 'in_or_out';
    public const QUERY_PARAMETER_REQ_FIELDS = 'req_fields';
    public const QUERY_PARAMETER_ORDER      = 'order';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, number?: non-empty-string, operator?: non-empty-string, in_or_out?: non-empty-string, req_fields?: non-empty-string, order?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetBlockedNumbersModel;
}
