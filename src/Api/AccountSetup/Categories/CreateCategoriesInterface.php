<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;

interface CreateCategoriesInterface
{
    public function executeQuery(CategoriesPayload $payload): bool;
}
