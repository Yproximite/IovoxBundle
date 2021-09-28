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

# UpdateCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\UpdateCallFlow;

public function example(UpdateCallFlow $updateCallFlow)
{
    // add @ at beginning of key for attributes
    // add # for key to define the data of a node
    $payload = [
        'callFlow' => [
            '@name'    => 'name',
            '@newName' => 'newName',
            '@notes'   => 'notes',
            'call'     => [
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
    $response = $updateCallFlow->executeQuery($payload);
}
```

# DeleteCallFlows

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\DeleteCallFlows;

public function example(DeleteCallFlows $deleteCallFlows)
{
    // true if ok else BadResponseReturnException
    $response = $deleteCallFlows->executeQuery([DeleteCallFlows::QUERY_PARAMETER_CALL_FLOWS => 'call_flow_name|other_call_flow_name']);
}
```

see [DeleteCallFlows](../../src/Api/Calling/CallFlow/DeleteCallFlows.php) for available options
