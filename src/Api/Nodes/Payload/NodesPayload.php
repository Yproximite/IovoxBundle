<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class NodesPayload
{
    public const GROUP_CREATE = 'node_create';

    /**
     * @var array<int, NodePayload>
     */
    #[SerializedName('node')]
    #[Groups(groups: [self::GROUP_CREATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE])]
    public array $nodes;

    /**
     * @param array<int, NodePayload> $nodes
     */
    public function __construct(array $nodes = [])
    {
        $this->nodes = $nodes;
    }
}
