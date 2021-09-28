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
    // Return array
    $callFlow = $getCallFlow->executeQuery($options);
}
```
see [GetCallFlow](../../src/Api/Calling/CallFlow/GetCallFlow.php) for available options

# CreateCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\CreateCallFlow;

public function example(CreateCallFlow $createCallFlow)
{
    // add @ at beginning of key for attributes
    // add # for key to define the data of a node
    $payload = [
        'callFlow' => [
            '@name' => 'name',
            '@notes' => 'notes',
            'call' => [
                '@id' => 'id',
                '@label' => 'label',
                '@timeout' => 10,
                '@record' => 'false',
                '@sendCallAlert' => 'NONE',
                '@destinationPhoneNumber' => '?',
                '@destinationContactId' => '?',
                'eventHandlers' => []
            ]
        ]
    ];

    // Return true if OK
    $response = $createCallFlow->executeQuery($payload);
}
```
