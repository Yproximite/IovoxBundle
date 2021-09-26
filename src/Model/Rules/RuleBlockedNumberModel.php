<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Yproximite\IovoxBundle\Model\AbstractModel;

class RuleBlockedNumberModel extends AbstractModel
{
    private function __construct(public ?string $link, public ?string $timeTemplate, public ?string $blockingType)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['links']['link_id'] ?? null,
            $opts['time_template'],
            $opts['blocking_type'],
        );
    }
}
