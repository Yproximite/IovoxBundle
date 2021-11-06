# GetVoxnumbers

```php
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\GetVoxnumbersInterface;

public function example(GetVoxnumbersInterface $getVoxnumbers)
{
    $voxnumbers = $getVoxnumbers->executeQuery($options); 
} 
```

see [GetVoxnumbers](../../src/Api/Numbering/Voxnumbers/GetVoxnumbers.php) for available options

# SetCallStatus

```php
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\SetCallStatusInterface;
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload\VoxnumberPayload;
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\Payload\VoxnumbersPayload;

public function example(SetCallStatusInterface $setCallStatus)
{
    $payload = new VoxnumbersPayload(
        'ON',// ON|OFF
         [
            new VoxnumberPayload(33901020304),
            new VoxnumberPayload(33401020304),
        ]
    );
    
    // true if ok else BadResponseReturnException
    $result = $setCallStatus->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\SetCallStatusInterface;

public function example(SetCallStatusInterface $setCallStatus)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <call_status>OFF</call_status>
    <voxnumbers>
        <voxnumber>448001020304</voxnumber>
        <voxnumber>448451234567</voxnumber>
        <voxnumber>442077277277</voxnumber>
    </voxnumbers>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $setCallStatus->executeXmlStringQuery($xmlString); 
}
```

# DeleteVoxnumbersFromAccount

```php
use Yproximite\IovoxBundle\Api\Numbering\Voxnumbers\DeleteVoxnumbersFromAccountInterface;

public function example(DeleteVoxnumbersFromAccountInterface $deleteVoxnumbersFromAccount)
{
    // true if ok else BadResponseReturnException
    $result = $deleteVoxnumbersFromAccount->executeQuery([DeleteVoxnumbersFromAccountInterface::QUERY_PARAMETER_FULL_VOXNUMBERS => '33901020304,33401020304']); 
}
```

see [DeleteVoxnumbersFromAccount](../../src/Api/Numbering/Voxnumbers/DeleteVoxnumbersFromAccount.php) for available options
