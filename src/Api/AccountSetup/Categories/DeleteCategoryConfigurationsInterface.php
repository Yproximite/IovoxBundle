<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

interface DeleteCategoryConfigurationsInterface
{
    public const QUERY_PARAMETER_CATEGORIES_IDS = 'categories_ids';

    /**
     * @param array{ categories_ids: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
