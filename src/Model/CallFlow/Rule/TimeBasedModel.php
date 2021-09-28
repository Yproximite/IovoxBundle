<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\EventHandlersModel;

class TimeBasedModel extends AbstractModel
{
    private function __construct(public ?string $id, public ?string $label, public EventHandlersModel $eventHandlers)
    {
    }

    public static function create(array $opts): self
    {
        $timeBasedAttributes = $opts['@attributes'];

        return new self(
            $timeBasedAttributes['id'],
            $timeBasedAttributes['label'],
            EventHandlersModel::create($opts['eventHandlers'])
        );
    }
}
