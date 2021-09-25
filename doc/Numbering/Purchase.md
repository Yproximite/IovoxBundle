# GetVoxnumberRegions

```php
use Yproximite\IovoxBundle\Api\Numbering\Purchase\GetVoxnumberRegions;

public function example(GetVoxnumberRegions $getVoxnumberRegions)
{
    $voxnumberRegions = $getVoxnumberRegions->executeQuery($options); 
}
```

see [GetVoxnumberRegions](../../src/Api/Numbering/Purchase/GetVoxnumberRegions.php) for available options

# PurchaseVoxnumbers

```php
use Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload\PurchaseVoxNumberAdditionalInformationPayload;
use Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload\PurchaseVoxnumberPayload;
use Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload\PurchaseVoxnumbersPayload;
use Yproximite\IovoxBundle\Api\Numbering\Purchase\PurchaseVoxnumbers;

public function example(PurchaseVoxnumbers $purchaseVoxnumbers)
{
    $payload = new PurchaseVoxnumbersPayload([
        new PurchaseVoxnumberPayload(33, 9, 'NATIONAL', 1),
        new PurchaseVoxnumberPayload(
            33,// country_code
            4,// area_code
            'GEOGRAPHIC',//'NATIONAL', 'GEOGRAPHIC', 'TOLLFREE'
            2,// quantity
            new PurchaseVoxNumberAdditionalInformationPayload(
                'firstname', 
                'lastname',
                'company',
                'street',
                20,// building_number
                'city',
                'zipcode'
            )
        ),
        'callback_url',
        'cc_list',// A list of emails separated by commas
        'dynamic_quantity',// TRUE|FALSE
    ]);
    
    // if ok else BadResponseReturnException
    $response = $purchaseVoxnumbers->executeQuery($payload); 
}
```

see [PurchaseVoxnumbersPayload](../../src/Api/Numbering/Purchase/Payload/PurchaseVoxnumbersPayload.php) for available payload arguments
