<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class BlockedNumbersPayload
{
    public const GROUP_CREATE = 'blocked_numbers_create';

    /** @var array<int, TimeTemplatePayload> */
    #[SerializedName('blocked_number')]
    #[Groups(groups: [self::GROUP_CREATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE])]
    public array $blockedNumbers;

    /**
     * @param array<int, TimeTemplatePayload> $blockedNumbers
     */
    public function __construct(array $blockedNumbers = [])
    {
        $this->blockedNumbers = $blockedNumbers;
    }
}
