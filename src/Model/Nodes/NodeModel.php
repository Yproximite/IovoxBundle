<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Yproximite\IovoxBundle\Model\AbstractModel;

class NodeModel extends AbstractModel
{
    protected function __construct(
        public ?string $nodeId,
        public ?string $nodeName,
        public ?string $nodeType,
        public ?string $linkId,
        public ?string $linkName,
        public ?string $linkType,
        public ?string $voxnumber,
        public ?string $ruleTemplateName
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['node_id'] ?? null,
            $opts['node_name'] ?? null,
            $opts['node_type'] ?? null,
            $opts['link_id'] ?? null,
            $opts['link_name'] ?? null,
            $opts['link_type'] ?? null,
            $opts['voxnumber'] ?? null,
            $opts['rule_template_name'] ?? null,
        );
    }
}
