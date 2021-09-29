# GetContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\GetContactsInterface;

public function example(GetContactsInterface $getContacts)
{
    $contacts = $getContacts->executeQuery($options); 
} 
```

see [GetContacts](../../src/Api/AccountSetup/Contacts/GetContacts.php) for available options

# GetContactDetails

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\GetContactDetailsInterface;

public function example(GetContactDetailsInterface $getContactDetails)
{
    $contactDetails = $getContactDetails->executeQuery([GetContactDetailsInterface::QUERY_PARAMETER_CONTACT_ID => 'contact id']); 
} 
```

see [GetContactDetails](../../src/Api/AccountSetup/Contacts/GetContactDetails.php) for available options

# CreateContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\CreateContactsInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;

public function example(CreateContactsInterface $createContacts)
{
    $payload = new ContactsPayload([
        new ContactPayload('contact_id'),
        new ContactPayload(
            'contact_id',
            'display_name',
            'first_name',
            'last_name',
            'email',
            'email_2',
            'company',
            'mobile_phone',
            'home_phone',
            'business_phone',
            'business_fax',
            'work_address_1',
            'work_address_2',
            'work_city',
            'work_country',
            'work_postcode',
            'home_address_1',
            'home_address_2',
            'home_city',
            'home_country',
            'home_postcode',
            'notes',
        ),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createContacts->executeQuery($payload); 
}

```

# UpdateContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\UpdateContactsInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;

public function example(UpdateContactsInterface $updateContacts)
{
    $payload = new ContactsPayload([
        new ContactPayload('contact_id'),
        new ContactPayload(
            'contact_id',
            'display_name',
            'first_name',
            'last_name',
            'email',
            'email_2',
            'company',
            'mobile_phone',
            'home_phone',
            'business_phone',
            'business_fax',
            'work_address_1',
            'work_address_2',
            'work_city',
            'work_country',
            'work_postcode',
            'home_address_1',
            'home_address_2',
            'home_city',
            'home_country',
            'home_postcode',
            'notes',
            'new_contact_id'
        ),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $updateContacts->executeQuery($payload); 
} 
```

# DeleteContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\DeleteContactsInterface;

public function example(DeleteContactsInterface $deleteContacts)
{
    // true if ok else BadResponseReturnException
    $result = $deleteContacts->executeQuery([DeleteContactsInterface::QUERY_PARAMETER_CONTACT_IDS => 'contact_id_1,contact_id_2']); 
}
```

see [DeleteContacts](../../src/Api/AccountSetup/Contacts/DeleteContacts.php) for available options
