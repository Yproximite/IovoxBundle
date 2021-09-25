<?php

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class GenericQueryParameter implements QueryParameterInterface
{
    public const TYPE_INTEGER = 'int';
    public const TYPE_STRING  = 'string';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_ARRAY   = 'array';

    public function __construct(protected string $name, protected string $type, protected string $description = '', protected bool $mandatory = false, protected string|int|array|null $defaultValue = null)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isMandatory(): bool
    {
        return $this->mandatory;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isValid(int|string|array|null $value): bool
    {
        return match ($this->getType()) {
            static::TYPE_INTEGER => is_integer($value),
            static::TYPE_STRING => is_string($value),
            static::TYPE_BOOLEAN => in_array($value, ['TRUE', 'FALSE'], true),
            static::TYPE_ARRAY => is_array($value),
            default => false,
        };
    }

    public function getDefaultValue(): int|string|array|null
    {
        return $this->defaultValue;
    }
}
