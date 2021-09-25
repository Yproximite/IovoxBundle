<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class VoxnumberPayload
{
    #[Groups(groups: [VoxnumbersPayload::GROUP_CALL_STATUS])]
    #[Assert\NotNull(groups: [VoxnumbersPayload::GROUP_CALL_STATUS])]
    public int $voxnumber;

    public function __construct(int $voxnumber)
    {
        $this->voxnumber = $voxnumber;
    }
}
