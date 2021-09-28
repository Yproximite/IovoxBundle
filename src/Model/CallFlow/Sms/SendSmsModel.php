<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Sms;

use Yproximite\IovoxBundle\Model\AbstractModel;

class SendSmsModel extends AbstractModel
{
    private function __construct(public ?string $id, public ?string $label, public ?string $message, public ?string $from, public ?string $destinationPhoneNumber, public ?string $destinationContactId)
    {
    }

    public static function create(array $opts): self
    {
        $smsAttributes = $opts['@attributes'];

        return new self(
            $smsAttributes['id'] ?? null,
            $smsAttributes['label'] ?? null,
            $smsAttributes['message'] ?? null,
            $smsAttributes['from'] ?? null,
            $smsAttributes['destinationPhoneNumber'] ?? null,
            $smsAttributes['destinationContactId'] ?? null,
        );
    }
}
