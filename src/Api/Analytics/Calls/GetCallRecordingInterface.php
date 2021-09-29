<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Analytics\Calls;

interface GetCallRecordingInterface
{
    public const QUERY_PARAMETER_ID = 'id';

    /**
     * @param array{ id: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): string;
}
