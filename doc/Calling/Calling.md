# InitiateCall

```php
use Yproximite\IovoxBundle\Api\Calling\Calling\InitiateCall;

public function example(InitiateCall $initiateCall)
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
