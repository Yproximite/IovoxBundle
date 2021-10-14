<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Yproximite\IovoxBundle\Model\AbstractModel;

class RuleTemplateModel extends AbstractModel
{
    private function __construct(public ?string $templateName, public ?string $templateNotes, public ?string $templateType, public ?\DateTimeImmutable $created, public ?bool $advanced)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['template_name'] ?? null,
            $opts['template_notes'] ?? null,
            $opts['template_type'] ?? null,
            array_key_exists('created', $opts) ? new \DateTimeImmutable($opts['created']) : null,
            array_key_exists('advanced', $opts) ? 'YES' === $opts['advanced'] : null,
        );
    }
}
