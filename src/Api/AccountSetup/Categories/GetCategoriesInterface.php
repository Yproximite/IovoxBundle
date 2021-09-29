<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Model\Categories\GetCategoriesModel;

interface GetCategoriesInterface
{
    public const QUERY_PARAMETER_REQ_FIELDS         = 'req_fields';
    public const QUERY_PARAMETER_PARENT_CATEGORY_ID = 'parent_category_id';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, req_fields?: non-empty-string, parent_category_id?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCategoriesModel;
}
