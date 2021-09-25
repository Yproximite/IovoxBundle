<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractVoxnumbers extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Voxnumbers';
    }
}
