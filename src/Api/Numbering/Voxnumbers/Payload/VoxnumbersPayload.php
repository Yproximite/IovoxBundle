<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class VoxnumbersPayload
{
    public const GROUP_CALL_STATUS = 'voxnumbers_call_status';

    #[Groups(groups: [self::GROUP_CALL_STATUS])]
    #[Assert\NotNull(groups: [self::GROUP_CALL_STATUS])]
    #[Assert\Choice(choices: ['ON', 'OFF'], groups: [self::GROUP_CALL_STATUS])]
    public string $callStatus;

    /** @var array<int, VoxnumberPayload> */
    #[Groups(groups: [self::GROUP_CALL_STATUS])]
    #[Assert\Valid(groups: [self::GROUP_CALL_STATUS])]
    public array $voxnumbers;

    /**
     * @param array<int, VoxnumberPayload> $voxnumbers
     */
    public function __construct(string $callStatus, array $voxnumbers)
    {
        $this->callStatus = $callStatus;
        $this->voxnumbers = $voxnumbers;
    }
}
