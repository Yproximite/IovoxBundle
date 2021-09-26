<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractRules extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Rules';
    }
}
