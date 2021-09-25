<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractPurchase extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Purchase';
    }
}
