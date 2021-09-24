<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NodePayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE])]
    public ?string $nodeId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE])]
    public ?string $nodeName;

    #[Groups(groups: [NodesPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE])]
    public ?string $nodeType;

    #[Groups(groups: [NodesPayload::GROUP_CREATE])]
    public ?\DateTimeImmutable $nodeDate;

    public function __construct(?string $nodeId, ?string $nodeName = null, ?string $nodeType = null, ?\DateTimeImmutable $nodeDate = null)
    {
        $this->nodeId   = $nodeId;
        $this->nodeName = $nodeName;
        $this->nodeType = $nodeType;
        $this->nodeDate = $nodeDate;
    }
}
