<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IovoxBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
