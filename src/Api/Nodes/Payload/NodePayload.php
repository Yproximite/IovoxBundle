<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Nodes\Payload;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NodePayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeName;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeType;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?\DateTimeImmutable $nodeDate;

    /** @var Collection<int, LinkPayload>|null */
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\Valid(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public ?Collection $links;

    /**
     * @param Collection<int, LinkPayload>|null $links
     */
    public function __construct(?string $nodeId, ?string $nodeName = null, ?string $nodeType = null, ?\DateTimeImmutable $nodeDate = null, ?Collection $links = null)
    {
        $this->nodeId   = $nodeId;
        $this->nodeName = $nodeName;
        $this->nodeType = $nodeType;
        $this->nodeDate = $nodeDate;
        $this->links    = $links;
    }
}
