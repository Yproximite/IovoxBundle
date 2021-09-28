<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call\Event;

use Yproximite\IovoxBundle\Model\AbstractModel;

class KeyEventModel extends AbstractModel
{
    private function __construct(public ?string $action, public ?string $keyPressSequence, public mixed $rules = null)
    {
    }

    public static function create(array $opts): self
    {
        $keyEventAttributes = $opts['@attributes'];

        return new self(
            $keyEventAttributes['action'],
            $keyEventAttributes['keyPressSequence'],
            'call'
        );
    }
}
