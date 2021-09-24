<?php

namespace Yproximite\IovoxBundle\Api\QueryParameter;

interface QueryParameterInterface
{
    public function getName(): string;

    public function getType(): string;

    public function isMandatory(): bool;

    public function getDescription(): ?string;

    public function isValid(int|string|null $value): bool;

    public function getDefaultValue(): int|string|null;
}
