<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload\VoxnumbersPayload;

interface SetCallStatusInterface
{
    public function executeQuery(VoxnumbersPayload $payload): bool;
}
