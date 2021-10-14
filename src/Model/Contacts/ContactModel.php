<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Contacts;

use Yproximite\IovoxBundle\Model\AbstractModel;

class ContactModel extends AbstractModel
{
    private function __construct(public ?string $contactId, public ?string $displayName, public ?string $company, public ?string $email, public ?string $businessPhone, public ?string $assignedStatus)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['contact_id'] ?? null,
            $opts['display_name'] ?? null,
            $opts['company'] ?? null,
            $opts['email'] ?? null,
            $opts['business_phone'] ?? null,
            $opts['assigned_status'] ?? null,
        );
    }
}
