<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\ErrorResult;

class GenericErrorResult implements ErrorResultInterface
{
    public function __construct(protected int $code, protected string $error, protected string $resolution)
    {
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getResolution(): string
    {
        return $this->resolution;
    }
}
