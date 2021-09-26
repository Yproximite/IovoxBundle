<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Countries;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractCountries extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Countries';
    }
}
