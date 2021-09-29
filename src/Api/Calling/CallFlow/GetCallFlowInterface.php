<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Yproximite\IovoxBundle\Model\CallFlow\GetCallFlowModel;

interface GetCallFlowInterface
{
    public const QUERY_PARAMETER_CALL_FLOW = 'call_flow';

    /**
     * @param array{ call_flow: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCallFlowModel;
}
