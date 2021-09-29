<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase;

use Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload\PurchaseVoxnumbersPayload;
use Yproximite\IovoxBundle\Model\Purchase\PurchaseVoxnumbersResponseModel;

interface PurchaseVoxnumbersInterface
{
    public function executeQuery(PurchaseVoxnumbersPayload $payload): PurchaseVoxnumbersResponseModel;
}
