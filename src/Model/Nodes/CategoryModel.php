<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CategoryModel extends AbstractModel
{
    protected function __construct(public ?string $categoryId, public ?string $label, public ?string $value)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['category_id'],
            $opts['label'],
            $opts['value'],
        );
    }
}
