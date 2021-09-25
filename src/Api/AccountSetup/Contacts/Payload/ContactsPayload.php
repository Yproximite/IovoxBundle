<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class ContactsPayload
{
    public const GROUP_CREATE = 'contacts_create';
    public const GROUP_UPDATE = 'contacts_update';

    /** @var array<int, ContactPayload> */
    #[SerializedName('contact')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    public array $contacts;

    #[Groups(groups: [self::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['TRUE', 'FALSE'], groups: [self::GROUP_UPDATE])]
    public ?string $rmRules;

    #[Groups(groups: [self::GROUP_UPDATE])]
    #[Assert\Choice(choices: ['TRUE', 'FALSE'], groups: [self::GROUP_UPDATE])]
    public ?string $replaceDetails;

    /**
     * @param array<int, ContactPayload> $contacts
     */
    public function __construct(array $contacts = [], ?string $rmRules = null, ?string $replaceDetails = null)
    {
        $this->contacts       = $contacts;
        $this->rmRules        = $rmRules;
        $this->replaceDetails = $replaceDetails;
    }
}
