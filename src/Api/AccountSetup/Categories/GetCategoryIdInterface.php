<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Model\Categories\GetCategoryIdModel;

interface GetCategoryIdInterface
{
    public const QUERY_PARAMETER_LABEL     = 'label';
    public const QUERY_PARAMETER_VALUE     = 'value';
    public const QUERY_PARAMETER_DELIMITER = 'delimiter';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, label: non-empty-string, value: non-empty-string, delimiter?: string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCategoryIdModel;
}
