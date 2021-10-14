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
            $opts['number'] ?? null,
            $opts['in_or_out'] ?? null,
            $opts['operator'] ?? null,
            $opts['notes'] ?? null,
            $opts['default'] ?? null,
            (new ArrayCollection(static::formatResult($opts['rules']['rule'] ?? [], false)))->map(fn ($v): RuleBlockedNumberModel => RuleBlockedNumberModel::create($v))
        );
    }
}
