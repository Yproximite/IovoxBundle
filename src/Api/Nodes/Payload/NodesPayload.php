<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class NodesPayload
{
    public const GROUP_CREATE      = 'node_create';
    public const GROUP_UPDATE      = 'node_update';
    public const GROUP_CREATE_FULL = 'node_create_full';

    /** @var array<int, NodePayload> */
    #[SerializedName('node')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    public array $nodes;

    /**
     * @param array<int, NodePayload> $nodes
     */
    public function __construct(array $nodes = [])
    {
        $this->nodes = $nodes;
    }
}
