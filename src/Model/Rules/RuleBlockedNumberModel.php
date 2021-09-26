<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Yproximite\IovoxBundle\Model\AbstractModel;

class RuleBlockedNumberModel extends AbstractModel
{
    /**
     * @param array<int, string> $links
     */
    private function __construct(public array $links, public ?string $timeTemplate, public ?string $blockingType)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['links']['link_id'] ?? [],
            $opts['time_template'],
            $opts['blocking_type'],
        );
    }
}
