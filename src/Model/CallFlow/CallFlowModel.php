<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CallFlowModel extends AbstractModel
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
            (null !== $created  = ($opts['created'] ?? null)) ? new \DateTimeImmutable($created) : null,
            (null !== $advanced = ($opts['advanced'] ?? null)) ? 'YES' === $advanced : null,
        );
    }
}
