# GetCallFlows

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\GetCallFlows;

public function example(GetCallFlows $getCallFlows)
{
    $callFlows = $getCallFlows->executeQuery($options);
}
```
see [GetCallFlows](../../src/Api/Calling/CallFlow/GetCallFlows.php) for available options

# GetCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\GetCallFlow;

public function example(GetCallFlow $getCallFlow)
{
    // Return array, need contributors to convert into DTO
    $callFlow = $getCallFlow->executeQuery($options);
}
```
see [GetCallFlow](../../src/Api/Calling/CallFlow/GetCallFlow.php) for available options
