# GetCallFlows

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\GetCallFlowsInterface;

public function example(GetCallFlowsInterface $getCallFlows)
{
    $callFlows = $getCallFlows->executeQuery($options);
}
```

see [GetCallFlows](../../src/Api/Calling/CallFlow/GetCallFlows.php) for available options

# GetCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\GetCallFlowInterface;

public function example(GetCallFlowInterface $getCallFlow)
{
    // Return array
    $callFlow = $getCallFlow->executeQuery($options);
}
```

see [GetCallFlow](../../src/Api/Calling/CallFlow/GetCallFlow.php) for available options

# CreateCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\CreateCallFlowInterface;

public function example(CreateCallFlowInterface $createCallFlow)
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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\CreateCallFlowInterface;

public function example(CreateCallFlowInterface $createCallFlow)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
 
<request>
    <callFlow name="Call Agent" notes="Will Call the agent, can be used for every agent in my account.">
        <call id="call_1" label="Call" destinationPhoneNumber="?" destinationContactId="?" record="true" sendCallAlert="NONE"></call>
    </callFlow>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createCallFlow->executeXmlStringQuery($xmlString); 
}
```

# UpdateCallFlow

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\UpdateCallFlowInterface;

public function example(UpdateCallFlowInterface $updateCallFlow)
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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\UpdateCallFlowInterface;

public function example(UpdateCallFlowInterface $updateCallFlow)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
  
<request>
    <callFlow name="Call Agent" newName="Call Agent + Whisper Called" notes="Will Call the agent, can be used for every agent in my account.">
        <call id="call_1" label="Call" destinationPhoneNumber="?" destinationContactId="?" record="true" sendCallAlert="NONE">
            <calledMessage>
                <soundFile soundLabel="Lead brought by IOVOX"/>
            </calledMessage>
        </call>
    </callFlow>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateCallFlow->executeXmlStringQuery($xmlString); 
}
```

# DeleteCallFlows

```php
use Yproximite\IovoxBundle\Api\Calling\CallFlow\DeleteCallFlowsInterface;

public function example(DeleteCallFlowsInterface $deleteCallFlows)
{
    // true if ok else BadResponseReturnException
    $response = $deleteCallFlows->executeQuery([DeleteCallFlows::QUERY_PARAMETER_CALL_FLOWS => 'call_flow_name|other_call_flow_name']);
}
```

see [DeleteCallFlows](../../src/Api/Calling/CallFlow/DeleteCallFlows.php) for available options
