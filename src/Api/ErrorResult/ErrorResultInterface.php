<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

interface ErrorResultInterface
{
    public function getCode(): int;

    public function getError(): string;

    public function getResolution(): string;
}
