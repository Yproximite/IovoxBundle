<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\CallFlow;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractCallFlow extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/CallFlow';
    }
}
