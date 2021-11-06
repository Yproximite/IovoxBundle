<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;
use Yproximite\IovoxBundle\Api\XmlQueryStringInterface;

interface CreateContactsInterface extends XmlQueryStringInterface
{
    public function executeQuery(ContactsPayload $payload): bool;
}
