<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class ContactsPayload
{
    public const GROUP_CREATE = 'contacts_create';

    /** @var array<int, ContactPayload> */
    #[SerializedName('contact')]
    #[Groups(groups: [self::GROUP_CREATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE])]
    public array $contacts;

    /**
     * @param array<int, ContactPayload> $contacts
     */
    public function __construct(array $contacts = [])
    {
        $this->contacts = $contacts;
    }
}
