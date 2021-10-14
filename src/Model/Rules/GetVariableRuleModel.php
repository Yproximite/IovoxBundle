<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Yproximite\IovoxBundle\Model\AbstractModel;

class GetVariableRuleModel extends AbstractModel
{
    /**
     * @param array<int|string, mixed> $data
     */
    private function __construct(public ?string $ruleId, public ?string $ruleType, public ?string $ruleLabel, public array $data)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['rule_id'] ?? null,
            $opts['rule_type'] ?? null,
            $opts['rule_label'] ?? null,
            $opts
        );
    }
}
