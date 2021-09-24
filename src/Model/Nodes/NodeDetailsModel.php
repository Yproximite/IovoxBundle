<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class NodeDetailsModel extends AbstractModel
{
    /**
     * @param Collection<int, LinkModel> $links
     */
    protected function __construct(
        public ?string $nodeId,
        public ?string $nodeName,
        public ?string $nodeType,
        public Collection $links,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['node_id'],
            $opts['node_name'],
            $opts['node_type'],
            (new ArrayCollection(static::formatResult($opts['links']['link'] ?? [], false)))->map(fn ($v): LinkModel => LinkModel::create($v))
        );
    }
}
