<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Nodes;

use Yproximite\IovoxBundle\Model\AbstractModel;

class ContactModel extends AbstractModel
{
    protected function __construct(public ?string $contactId, public ?string $phoneNumber)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['contact_id'] ?? [],
            $opts['phone_number'] ?? []
        );
    }
}
