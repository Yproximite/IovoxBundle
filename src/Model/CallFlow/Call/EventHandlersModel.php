<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\Event\CallEventModel;

class EventHandlersModel extends AbstractModel
{
    /**
     * @param Collection<int, CallEventModel> $callEvents
     */
    private function __construct(public Collection $callEvents, public mixed $failure = '')
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            (new ArrayCollection(static::formatResult($opts['callEvent'], false)))->map(fn($v): CallEventModel => CallEventModel::create($v)),
            '',
        );
    }
}
