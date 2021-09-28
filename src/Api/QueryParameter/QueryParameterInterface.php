<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\QueryParameter;

interface QueryParameterInterface
{
    public function getName(): string;

    public function getType(): string;

    public function isMandatory(): bool;

    public function getDescription(): ?string;

    /**
     * @param int|string|array<int|string, mixed>|null $value
     */
    public function isValid(int|string|array|null $value): bool;

    /**
     * @return int|string|array<int|string, mixed>|null
     */
    public function getDefaultValue(): int|string|array|null;
}
