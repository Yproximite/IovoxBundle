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
            $opts['contact_id'],
            $opts['display_name'],
            $opts['company'],
            $opts['email'],
            $opts['business_phone'],
            $opts['assigned_status'],
        );
    }
}
