<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class GetVariableRulesOfTemplateModel extends AbstractModel
{
    /**
     * @param Collection<int, GetVariableRuleModel> $rules
     */
    protected function __construct(public Collection $rules)
    {
    }

    public static function create(array $opts): self
    {
        $response = $opts['response'];

        return new self(
            (new ArrayCollection(static::formatResult($response['rules']['rule'] ?? [], false)))->map(fn ($v): GetVariableRuleModel => GetVariableRuleModel::create($v))
        );
    }
}
