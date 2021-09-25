<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Categories;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CategoryIdModel extends AbstractModel
{
    private function __construct(public ?string $categoryId, public ?string $categoryPath)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['category_id'],
            $opts['category_path'],
        );
    }
}
