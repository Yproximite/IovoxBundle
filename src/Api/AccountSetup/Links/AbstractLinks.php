<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractLinks extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Links';
    }
}
