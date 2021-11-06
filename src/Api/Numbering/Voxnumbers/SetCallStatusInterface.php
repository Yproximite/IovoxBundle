<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Voxnumbers;

use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload\VoxnumbersPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface SetCallStatusInterface extends XmlQueryStringInterface
{
    public function executeQuery(VoxnumbersPayload $payload): bool;
}
