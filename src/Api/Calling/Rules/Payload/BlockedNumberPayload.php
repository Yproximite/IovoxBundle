<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class BlockedNumberPayload
{
    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $number;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['IN', 'OUT'], groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $inOrOut;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['STARTSWITH', 'EQUALS'], groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $operator;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['BLOCK', 'ALLOW'], groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $default;

    /** @var array{ rule?: array<int, RuleBlockedNumberPayload>} */
    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\Valid(groups: [BlockedNumbersPayload::GROUP_CREATE, BlockedNumbersPayload::GROUP_UPDATE])]
    public array $rules;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $newNumber;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['IN', 'OUT'], groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $newInOrOut;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['STARTSWITH', 'EQUALS'], groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $newOperator;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['OVERWRITE'], groups: [BlockedNumbersPayload::GROUP_UPDATE])]
    public ?string $ifExists;

    /**
     * @param array<int, RuleBlockedNumberPayload> $rules
     */
    public function __construct(
        ?string $number = null,
        ?string $inOrOut = null,
        ?string $operator = null,
        ?string $default = null,
        array $rules = [],
        ?string $newNumber = null,
        ?string $newInOrOut = null,
        ?string $newOperator = null,
        ?string $ifExists = null,
    ) {
        $this->number      = $number;
        $this->inOrOut     = $inOrOut;
        $this->operator    = $operator;
        $this->default     = $default;
        $this->rules       = [] !== $rules ? ['rule' => $rules] : [];
        $this->newNumber   = $newNumber;
        $this->newInOrOut  = $newInOrOut;
        $this->newOperator = $newOperator;
        $this->ifExists    = $ifExists;
    }
}
