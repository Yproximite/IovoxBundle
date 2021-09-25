<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractNodes extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Nodes';
    }
}
