<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Categories;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\ModelInterface;

class CategoryModel extends AbstractModel implements ModelInterface
{
    private function __construct(public ?string $categoryId, public ?string $label, public ?string $value, public ?int $childCount)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['category_id'],
            $opts['label'],
            $opts['value'],
            (int) $opts['child_count'],
        );
    }
}
