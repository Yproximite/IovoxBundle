<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Analytics\Calls;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractCalls extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Calls';
    }
}
