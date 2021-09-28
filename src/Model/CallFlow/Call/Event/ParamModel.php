<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call\Event;

use Yproximite\IovoxBundle\Model\AbstractModel;

class ParamModel extends AbstractModel
{
    private function __construct(public ?string $name, public ?string $value)
    {
    }

    public static function create(array $opts): self
    {
        $paramAttributes = $opts['@attributes'];

        return new self(
            $paramAttributes['name'],
            $paramAttributes['value'],
        );
    }
}
