# GetContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\GetContacts;

public function example(GetContacts $getContacts)
{
    $contacts = $getContacts->executeQuery($options); 
} 
```

see [GetContacts](../../src/Api/AccountSetup/Contacts/GetContacts.php) for available options

# GetContactDetails

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\GetContactDetails;

public function example(GetContactDetails $getContactDetails)
{
    $contactDetails = $getContactDetails->executeQuery([GetContactDetails::QUERY_PARAMETER_CONTACT_ID => 'contact id']); 
} 
```

see [GetContactDetails](../../src/Api/AccountSetup/Contacts/GetContactDetails.php) for available options

# CreateContacts

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\CreateContacts;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;

public function example(CreateContacts $createContacts)
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
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\UpdateContacts;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\Payload\ContactsPayload;

public function example(UpdateContacts $updateContacts)
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
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\DeleteContacts;

public function example(DeleteContacts $deleteContacts)
{
    // true if ok else BadResponseReturnException
    $result = $deleteContacts->executeQuery([DeleteContacts::QUERY_PARAMETER_CONTACT_IDS => 'contact_id_1,contact_id_2']); 
}
```

see [DeleteContacts](../../src/Api/AccountSetup/Contacts/DeleteContacts.php) for available options
