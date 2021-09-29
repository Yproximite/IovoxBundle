<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Enum\BooleanString;

interface DeleteTimeTemplatesInterface
{
    public const QUERY_PARAMETER_TIME_TEMPLATE_LABELS = 'time_template_labels';
    public const QUERY_PARAMETER_FORCE                = 'force';

    /**
     * @param array{ time_template_labels: non-empty-string, force?: BooleanString::* } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
