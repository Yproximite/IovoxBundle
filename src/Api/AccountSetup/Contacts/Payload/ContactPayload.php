<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ContactPayload
{
    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    #[Assert\NotNull(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $contactId;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $displayName;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $firstName;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $lastName;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $email;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $email2;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $company;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $mobilePhone;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homePhone;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $businessPhone;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $businessFax;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $workAddress1;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $workAddress2;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $workCity;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $workCountry;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $workPostcode;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homeAddress1;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homeAddress2;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homeCity;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homeCountry;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $homePostcode;

    #[Groups(groups: [ContactsPayload::GROUP_CREATE])]
    public ?string $notes;

    public function __construct(
        ?string $contactId,
        ?string $displayName = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $email2 = null,
        ?string $company = null,
        ?string $mobilePhone = null,
        ?string $homePhone = null,
        ?string $businessPhone = null,
        ?string $businessFax = null,
        ?string $workAddress1 = null,
        ?string $workAddress2 = null,
        ?string $workCity = null,
        ?string $workCountry = null,
        ?string $workPostcode = null,
        ?string $homeAddress1 = null,
        ?string $homeAddress2 = null,
        ?string $homeCity = null,
        ?string $homeCountry = null,
        ?string $homePostcode = null,
        ?string $notes = null,
    ) {
        $this->contactId     = $contactId;
        $this->displayName   = $displayName;
        $this->firstName     = $firstName;
        $this->lastName      = $lastName;
        $this->email         = $email;
        $this->email2        = $email2;
        $this->company       = $company;
        $this->mobilePhone   = $mobilePhone;
        $this->homePhone     = $homePhone;
        $this->businessPhone = $businessPhone;
        $this->businessFax   = $businessFax;
        $this->workAddress1  = $workAddress1;
        $this->workAddress2  = $workAddress2;
        $this->workCity      = $workCity;
        $this->workCountry   = $workCountry;
        $this->workPostcode  = $workPostcode;
        $this->homeAddress1  = $homeAddress1;
        $this->homeAddress2  = $homeAddress2;
        $this->homeCity      = $homeCity;
        $this->homeCountry   = $homeCountry;
        $this->homePostcode  = $homePostcode;
        $this->notes         = $notes;
    }
}
