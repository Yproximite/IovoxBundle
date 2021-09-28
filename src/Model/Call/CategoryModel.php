<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Call;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CategoryModel extends AbstractModel
{
    private function __construct(public ?string $label, public ?string $value, public ?string $categoryId)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['label'] ?? null,
            $opts['value'] ?? null,
            $opts['category_id'] ?? null,
        );
    }
}
