<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface CreateCategoriesInterface extends XmlQueryStringInterface
{
    public function executeQuery(CategoriesPayload $payload): bool;
}
