<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CallFlowModel extends AbstractModel
{
    public function __construct(public ?string $name, public ?string $notes, public CallModel $call)
    {
    }

    public static function create(array $opts): self
    {
        $callFlow           = $opts['callFlow'];
        $callFlowAttributes = $callFlow['@attributes'];

        return new self(
            $callFlowAttributes['name'] ?? null,
            $callFlowAttributes['notes'] ?? null,
            CallModel::create($callFlow['call'])
        );
    }
}
