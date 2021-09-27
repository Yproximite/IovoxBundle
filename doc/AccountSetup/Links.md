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

# UpdateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\UpdateLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(UpdateLinks $updateLinks)
{
    $payload = new LinksPayload([
        new LinkPayload(null, 'link_id', 'link_name', 'link_type'),
        new LinkPayload(
            null,
            'link_id',
            'link_name',
            'link_type',
            '2020-10-20',// link_date
            0,// click_to_call 0|1
            'new_link_id'
        ),
    ]);

    // true if ok else BadResponseReturnException
    $result = $updateLinks->executeQuery($payload);
}
```

# DeleteLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\DeleteLinks;

public function example(DeleteLinks $deleteLinks)
{
    // true if ok else BadResponseReturnException
    $result = $deleteLinks->executeQuery([DeleteLinks::QUERY_PARAMETER_LINK_IDS => 'link_id_1,link_id_2']); 
}
```

see [DeleteLinks](../../src/Api/AccountSetup/Links/DeleteLinks.php) for available options

# AttachVoxnumberToLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachVoxnumberToLink;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachVoxnumberToLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\VoxNumberPayload;

public function example(AttachVoxnumberToLink $attachVoxnumberToLink)
{
    $payload = new AttachVoxnumberToLinkPayload([
        new VoxNumberPayload('link_id', 'BY AREA',33/* voxnumberIdd */,9/* areaCode */),
        new VoxNumberPayload('link_id', 'BY VOXNUMBER', null, null, 33492393368/* fullVoxnumber */),
        new VoxNumberPayload('link_id', 'BY POSTCODE', null, null, null, 'FRANCE'/* country FRANCE|UNITED KINGDOM */, '69000'/* postcode */),
    ]);

    // true if ok else BadResponseReturnException
    $result = $attachVoxnumberToLink->executeQuery($payload);
}
```

