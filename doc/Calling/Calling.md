# InitiateCall

```php
use Yproximite\IovoxBundle\Api\Calling\Calling\InitiateCallInterface;

public function example(InitiateCallInterface $initiateCall)
{
    $payload = [
        'link_id'        => 'link_id',
        'call_variables' => [
            'call_destination' => 33601020304,
            'custom_var'       => 'toto'
        ]
    ];

    $response = $initiateCall->executeQuery($payload);
}
```
