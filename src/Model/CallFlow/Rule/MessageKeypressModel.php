<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\EventHandlersModel;

class MessageKeypressModel extends AbstractModel
{
    private function __construct(public ?string $id, public ?string $label, public ?string $captureKeypress, public int $timout, public PlayModel $play, public EventHandlersModel $eventHandlers)
    {
    }

    public static function create(array $opts): self
    {
        $messageKeypressAttributes = $opts['@attributes'];

        return new self(
            $messageKeypressAttributes['id'],
            $messageKeypressAttributes['label'],
            $messageKeypressAttributes['captureKeypress'],
            (int) $messageKeypressAttributes['timeout'],
            PlayModel::create($opts['play']),
            EventHandlersModel::create($opts['eventHandlers'])
        );
    }
}
