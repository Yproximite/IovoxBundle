# GetRuleTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\GetRuleTemplates;

public function example(GetRuleTemplates $getRuleTemplates)
{
    $ruleTemplates = $getRuleTemplates->executeQuery($options); 
} 
```
see [GetRuleTemplates](../../src/Api/Calling/Rules/GetRuleTemplates.php) for available options

# CreateTimeTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\CreateTimeTemplates;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeFramePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;

public function example(CreateTimeTemplates $createTimeTemplates)
{
    $payload = new TimeTemplatesPayload([
        new TimeTemplatePayload('label', [
            new TimeFramePayload(),// all time
            new TimeFramePayload(
                '2021-10-01',// date_from
                '2022-01-01',// date_to
                'NONE',// YEARLY, MONTHLY, NONE
                '09:00',// time_from
                '18:00',// time_to
                TimeFramePayload::ALL_WEEK,// see const DAY_ in class TimeFramePayload
            ),
        ])
    ]);

    // true if ok else BadResponseReturnException
    $result = $createTimeTemplates->executeQuery($payload);
}
```
