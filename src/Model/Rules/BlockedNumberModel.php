<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class BlockedNumberModel extends AbstractModel
{
    /**
     * @param Collection<int, RuleBlockedNumberModel> $rules
     */
    private function __construct(public ?string $number, public ?string $inOrOut, public ?string $operator, public ?string $notes, public ?string $default, public Collection $rules)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['number'],
            $opts['in_or_out'],
            $opts['operator'],
            $opts['notes'],
            $opts['default'],
            (new ArrayCollection(static::formatResult($opts['rules']['rule'] ?? [], false)))->map(fn($v): RuleBlockedNumberModel => RuleBlockedNumberModel::create($v))
        );
    }
}
