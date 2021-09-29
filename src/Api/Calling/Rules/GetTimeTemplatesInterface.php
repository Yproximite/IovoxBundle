<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Model\Rules\GetTimeTemplatesModel;

interface GetTimeTemplatesInterface
{
    public const QUERY_PARAMETER_ORDER               = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS          = 'req_fields';
    public const QUERY_PARAMETER_TIME_TEMPLATE_LABEL = 'time_template_label';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, order?: non-empty-string, req_fields?: non-empty-string, time_template_label?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetTimeTemplatesModel;
}
