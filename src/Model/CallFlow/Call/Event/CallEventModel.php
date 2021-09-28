<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call\Event;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CallEventModel extends AbstractModel
{
    private function __construct(public ?string $action, public ?string $result)
    {
    }

    public static function create(array $opts): self
    {
        $callEventAttributes = $opts['@attributes'];

        return new self(
            $callEventAttributes['action'],
            $callEventAttributes['result'],
        );
    }
}
