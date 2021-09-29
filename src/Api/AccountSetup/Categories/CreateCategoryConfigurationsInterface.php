<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;

interface CreateCategoryConfigurationsInterface
{
    public function executeQuery(CategoriesPayload $payload): bool;
}
