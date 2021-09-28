<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\EventHandlersModel;

class EvaluateModel extends AbstractModel
{
    private function __construct(public ?string $id, public ?string $label, public ?string $leftExprValue, public EventHandlersModel $eventHandlers)
    {
    }

    public static function create(array $opts): self
    {
        $evaluateAttributes = $opts['@attributes'];

        return new self(
            $evaluateAttributes['id'],
            $evaluateAttributes['label'],
            $evaluateAttributes['leftExprValue'],
            EventHandlersModel::create($opts['eventHandlers'])
        );
    }
}
