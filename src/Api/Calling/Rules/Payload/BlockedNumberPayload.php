<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class BlockedNumberPayload
{
    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    public ?string $number;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['IN', 'OUT'], groups: [BlockedNumbersPayload::GROUP_CREATE])]
    public ?string $inOrOut;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['STARTSWITH', 'EQUALS'], groups: [BlockedNumbersPayload::GROUP_CREATE])]
    public ?string $operator;

    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Choice(choices: ['BLOCK', 'ALLOW'], groups: [BlockedNumbersPayload::GROUP_CREATE])]
    public ?string $default;

    /** @var array{ rule?: array<int, RuleBlockedNumberPayload>} */
    #[Groups(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    #[Assert\Valid(groups: [BlockedNumbersPayload::GROUP_CREATE])]
    public array $rules;

    /**
     * @param array<int, RuleBlockedNumberPayload> $rules
     */
    public function __construct(?string $number = null, ?string $inOrOut = null, ?string $operator = null, ?string $default = null, array $rules = [])
    {
        $this->number   = $number;
        $this->inOrOut  = $inOrOut;
        $this->operator = $operator;
        $this->default  = $default;
        $this->rules    = [] !== $rules ? ['rule' => $rules] : [];
    }
}
