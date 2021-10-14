<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class LinkModel extends AbstractModel
{
    /**
     * @param Collection<int, RuleModel>     $rules
     * @param Collection<int, CategoryModel> $categories
     */
    protected function __construct(
        public ?string $linkId,
        public ?string $linkName,
        public ?string $linkType,
        public ?string $voxnumber,
        public ?string $ruleTemplateName,
        public Collection $rules,
        public Collection $categories
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['link_id'] ?? null,
            $opts['link_name'] ?? null,
            $opts['link_type'] ?? null,
            $opts['voxnumber'] ?? null,
            $opts['rule_template_name'] ?? null,
            (new ArrayCollection(static::formatResult($opts['rules']['rule'] ?? [], false)))->map(fn ($v): RuleModel => RuleModel::create($v)),
            (new ArrayCollection(static::formatResult($opts['cats']['cat'] ?? [], false)))->map(fn ($v): CategoryModel => CategoryModel::create($v))
        );
    }
}
