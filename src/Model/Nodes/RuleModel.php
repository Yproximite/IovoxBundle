<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Yproximite\IovoxBundle\Model\AbstractModel;

class RuleModel extends AbstractModel
{
    protected function __construct(
        public ?string $ruleId,
        public ?string $ruleType,
        public ?string $ruleLabel,
        public ContactModel $contact,
        public CallerMessageModel $callerMessage,
        public CalledMessageModel $calledMessage,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['rule_id'] ?? null,
            $opts['rule_type'] ?? null,
            $opts['rule_label'] ?? null,
            ContactModel::create($opts['contact'] ?? []),
            CallerMessageModel::create($opts['caller_message'] ?? []),
            CalledMessageModel::create($opts['called_message'] ?? []),
        );
    }
}
