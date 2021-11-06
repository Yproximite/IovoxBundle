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

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\CreateContactsInterface;

public function example(CreateContactsInterface $createContacts)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
  <contact>
     <contact_id>client123</contact_id>
     <display_name>John Smith</display_name>
     <first_name>John</first_name>
     <last_name>Smith</last_name>
     <email>jsmith@iovox.com</email>
     <email_2>jsmith@iovox.com</email_2>
     <company>IOVOX</company>
     <mobile_phone>449789123123</mobile_phone>
     <home_phone>441223432123</home_phone>
     <business_phone>441223432987</business_phone>
     <business_fax>441223432984</business_fax>
     <work_address_1>155 Abbey Street</work_address_1>
     <work_address_2>Westminister</work_address_2>
     <work_city>London</work_city>
     <work_country>United Kingdom</work_country>
     <work_postcode>W1 5P6</work_postcode>                                 
     <home_address_1>155 Abbey Street</home_address_1>
     <home_address_2>Westminister</home_address_2>
     <home_city>London</home_city>
     <home_country>United Kingdom</home_country>
     <home_postcode>W1 5P6</home_postcode>
     <notes>This is a note.</notes>
   </contact>
   <contact>
   ...
   </contact>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createContacts->executeXmlStringQuery($xmlString); 
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

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Contacts\UpdateContactsInterface;

public function example(UpdateContactsInterface $updateContacts)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <rm_rules>TRUE</rm_rules>
     <replace_details>TRUE</replace_details>
     <contact>
         <contact_id>333</contact_id>
         <new_contact_id>333 Updated</new_contact_id>
         <display_name>John Smith</display_name>
         <first_name>John</first_name>
         <last_name>Smith</last_name>
         <email>jsmith@iovox.com</email>
         <email_2>jsmith@iovox.com</email_2>
         <company>Smith's ABC</company>
         <mobile_phone>447772412312</mobile_phone>
         <home_phone>44123231231</home_phone>
         <business_phone>44123871237</business_phone>
         <business_fax>44123875237</business_fax>
         <work_address_1>155 Abbey Street</work_address_1>
         <work_address_2>Westminister</work_address_2>
         <work_city>London</work_city>
         <work_country>United Kingdom</work_country>
         <work_postcode>W1 5P6</work_postcode>                                 
         <home_address_1>155 Abbey Street</home_address_1>
         <home_address_2>Westminister</home_address_2>
         <home_city>London</home_city>
         <home_country>United Kingdom</home_country>
         <home_postcode>W1 5P6</home_postcode>
         <notes>This is a note.</notes>
     </contact>
     <contact>
         ...
     <contact>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateContacts->executeXmlStringQuery($xmlString); 
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
