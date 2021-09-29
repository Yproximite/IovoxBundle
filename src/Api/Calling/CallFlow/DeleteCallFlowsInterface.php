<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Yproximite\IovoxBundle\Enum\BooleanString;

interface DeleteCallFlowsInterface
{
    public const QUERY_PARAMETER_CALL_FLOWS        = 'call_flows';
    public const QUERY_PARAMETER_DETACH_FROM_LINKS = 'detach_from_links';

    /**
     * @param array{ call_flows: non-empty-string, detach_from_links?: BooleanString::* } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
