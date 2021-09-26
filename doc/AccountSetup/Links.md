# GetLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\GetLinks;

public function example(GetLinks $getLinks)
{
    $links = $getLinks->executeQuery($options); 
} 
```

see [GetLinks](../../src/Api/AccountSetup/Links/GetLinks.php) for available options

# CreateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\CreateLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(CreateLinks $createLinks)
{
    $payload = new LinksPayload([
        new LinkPayload('node_id', 'link_id', 'link_name', 'link_type'),
        new LinkPayload(
            'node_id',
            'link_id',
            'link_name',
            'link_type',
            '2020-10-20',// link_date
            0// click_to_call 0|1
        ),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createLinks->executeQuery($payload); 
}
```
