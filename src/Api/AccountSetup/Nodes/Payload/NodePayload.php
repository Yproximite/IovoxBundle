<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class NodePayload
{
    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_UPDATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_UPDATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeId;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_UPDATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeName;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_UPDATE, NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\NotNull(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?string $nodeType;

    #[Groups(groups: [NodesPayload::GROUP_CREATE, NodesPayload::GROUP_UPDATE, NodesPayload::GROUP_CREATE_FULL])]
    public ?\DateTimeImmutable $nodeDate;

    /** @var array{ link: array<int, LinkPayload>|null} */
    #[SerializedName('links')]
    #[Groups(groups: [NodesPayload::GROUP_CREATE_FULL])]
    #[Assert\Valid(groups: [NodesPayload::GROUP_CREATE_FULL])]
    public array $links;

    #[Groups(groups: [NodesPayload::GROUP_UPDATE])]
    public ?string $newNodeId;

    /**
     * @param array<int, LinkPayload>|null $links
     */
    public function __construct(?string $nodeId, ?string $nodeName = null, ?string $nodeType = null, ?\DateTimeImmutable $nodeDate = null, ?array $links = null, ?string $newNodeId = null)
    {
        $this->nodeId    = $nodeId;
        $this->nodeName  = $nodeName;
        $this->nodeType  = $nodeType;
        $this->nodeDate  = $nodeDate;
        $this->links     = ['link' => $links];
        $this->newNodeId = $newNodeId;
    }
}
