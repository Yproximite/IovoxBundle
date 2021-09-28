<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Email;

use Yproximite\IovoxBundle\Model\AbstractModel;

class SendEmailModel extends AbstractModel
{
    private function __construct(public ?string $id, public ?string $label, public ?string $from, public ?string $destinationEmailAddress, public ?string $destinationContactId)
    {
    }

    public static function create(array $opts): self
    {
        $smsAttributes = $opts['@attributes'];

        return new self(
            $smsAttributes['id'] ?? null,
            $smsAttributes['label'] ?? null,
            $smsAttributes['from'] ?? null,
            $smsAttributes['destinationEmailAddress'] ?? null,
            $smsAttributes['destinationContactId'] ?? null,
        );
    }
}
