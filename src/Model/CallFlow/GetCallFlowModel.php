<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow;

use Yproximite\IovoxBundle\Model\AbstractModel;

class GetCallFlowModel extends AbstractModel
{
    /**
     * @param array<int|string, mixed> $data
     */
    protected function __construct(public array $data)
    {
    }

    public static function create(array $opts): self
    {
        return new self($opts);
    }
}
