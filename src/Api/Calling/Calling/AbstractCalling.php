<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Calling;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractCalling extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Calling';
    }
}
