<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call\Event;

use Yproximite\IovoxBundle\Model\AbstractModel;

class MatchEventModel extends AbstractModel
{
    private function __construct(public ?string $action, public ?string $rightExprValue, public ?string $operator, public mixed $rules = null)
    {
    }

    public static function create(array $opts): self
    {
        $timeEventAttributes = $opts['@attributes'];

        return new self(
            $timeEventAttributes['action'],
            $timeEventAttributes['rightExprValue'],
            $timeEventAttributes['operator'],
            'play'
        );
    }
}
