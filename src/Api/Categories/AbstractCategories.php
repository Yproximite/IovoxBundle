<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Categories;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractCategories extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Categories';
    }
}
