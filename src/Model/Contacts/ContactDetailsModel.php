<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Contacts;

use Yproximite\IovoxBundle\Model\AbstractModel;

class ContactDetailsModel extends AbstractModel
{
    private function __construct(
        public ?string $contactId,
        public ?string $firstName,
        public ?string $lastName,
        public ?string $displayName,
        public ?string $email,
        public ?string $email2,
        public ?string $company,
        public ?string $title,
        public ?string $businessPhone,
        public ?string $businessFax,
        public ?string $workAddress1,
        public ?string $workAddress2,
        public ?string $workCity,
        public ?string $workPostcode,
        public ?string $workCountry,
        public ?string $homePhone,
        public ?string $mobilePhone,
        public ?string $homeAddress1,
        public ?string $homeAddress2,
        public ?string $homeCity,
        public ?string $homePostcode,
        public ?string $homeCountry,
        public ?string $notes,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['contact_id'] ?? null,
            $opts['first_name'] ?? null,
            $opts['last_name'] ?? null,
            $opts['display_name'] ?? null,
            $opts['email'] ?? null,
            $opts['email_2'] ?? null,
            $opts['company'] ?? null,
            $opts['title'] ?? null,
            $opts['business_phone'] ?? null,
            $opts['business_fax'] ?? null,
            $opts['work_address_1'] ?? null,
            $opts['work_address_2'] ?? null,
            $opts['work_city'] ?? null,
            $opts['work_postcode'] ?? null,
            $opts['work_country'] ?? null,
            $opts['home_phone'] ?? null,
            $opts['mobile_phone'] ?? null,
            $opts['home_address_1'] ?? null,
            $opts['home_address_2'] ?? null,
            $opts['home_city'] ?? null,
            $opts['home_postcode'] ?? null,
            $opts['home_country'] ?? null,
            $opts['notes'] ?? null,
        );
    }
}
