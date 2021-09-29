<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;

interface CreateContactsInterface
{
    public function executeQuery(ContactsPayload $payload): bool;
}
