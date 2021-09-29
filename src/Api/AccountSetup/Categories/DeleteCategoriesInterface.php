<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

interface DeleteCategoriesInterface
{
    public const QUERY_PARAMETER_CATEGORIES = 'categories';

    /**
     * @param array{ categories: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
