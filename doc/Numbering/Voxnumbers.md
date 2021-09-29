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
