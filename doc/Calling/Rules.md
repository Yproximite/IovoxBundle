# GetRuleTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\GetRuleTemplatesInterface;

public function example(GetRuleTemplatesInterface $getRuleTemplates)
{
    $ruleTemplates = $getRuleTemplates->executeQuery($options);
}
```
see [GetRuleTemplates](../../src/Api/Calling/Rules/GetRuleTemplates.php) for available options

# GetTimeTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\GetTimeTemplatesInterface;

public function example(GetTimeTemplatesInterface $getTimeTemplates)
{
    $timeTemplates = $getTimeTemplates->executeQuery($options);
}
```
see [GetTimeTemplates](../../src/Api/Calling/Rules/GetTimeTemplates.php) for available options

# CreateTimeTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\CreateTimeTemplatesInterface;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeFramePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;

public function example(CreateTimeTemplatesInterface $createTimeTemplates)
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

# UpdateTimeTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\UpdateTimeTemplatesInterface;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeFramePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatePayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\TimeTemplatesPayload;

public function example(UpdateTimeTemplatesInterface $updateTimeTemplates)
{
    $payload = new TimeTemplatesPayload([
        new TimeTemplatePayload('label', [
            new TimeFramePayload(
                '2021-10-01',// date_from
                '2022-01-01',// date_to
                'NONE',// YEARLY, MONTHLY, NONE
                '09:00',// time_from
                '18:00',// time_to
                TimeFramePayload::ALL_WEEK,// see const DAY_ in class TimeFramePayload
            ),
        ], 'new label')
    ]);

    // true if ok else BadResponseReturnException
    $result = $updateTimeTemplates->executeQuery($payload);
}
```

# DeleteTimeTemplates

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\DeleteTimeTemplatesInterface;

public function example(DeleteTimeTemplatesInterface $deleteTimeTemplates)
{
    // true if ok else BadResponseReturnException
    $result = $deleteTimeTemplates->executeQuery([DeleteTimeTemplatesInterface::QUERY_PARAMETER_TIME_TEMPLATE_LABELS => 'label']); 
}
```

see [DeleteTimeTemplates](../../src/Api/Calling/Rules/DeleteTimeTemplates.php) for available options

# GetBlockedNumbers

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\GetBlockedNumbersInterface;

public function example(GetBlockedNumbersInterface $getBlockedNumbers)
{
    $blockedNumbers = $getBlockedNumbers->executeQuery($options);
}
```
see [GetBlockedNumbers](../../src/Api/Calling/Rules/GetBlockedNumbers.php) for available options

# CreateBlockedNumbers

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\CreateBlockedNumbersInterface;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumberPayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumbersPayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\RuleBlockedNumberPayload;

public function example(CreateBlockedNumbersInterface $createBlockedNumbers)
{
    $payload = new BlockedNumbersPayload([
        new BlockedNumberPayload('33601020304', 'IN', 'EQUALS', 'BLOCK'),
        new BlockedNumberPayload(
            '33601020304',
            'IN',// IN|OUT
            'EQUALS',// EQUALS|STARTSWITH
            'BLOCK',// BLOCK|ALLOW
            [
                new RuleBlockedNumberPayload(
                    ['link_id', 'other_link_id'],
                    'time_template',
                    'BLOCK',// BLOCK|ALLOW
                )
            ]
        ),
    ]);

    // true if ok else BadResponseReturnException
    $result = $createBlockedNumbers->executeQuery($payload);
}

```
# UpdateBlockedNumbers

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\UpdateBlockedNumbersInterface;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumberPayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\BlockedNumbersPayload;
use Yproximite\IovoxBundle\Api\Calling\Rules\Payload\RuleBlockedNumberPayload;

public function example(UpdateBlockedNumbersInterface $updateBlockedNumbers)
{
    $payload = new BlockedNumbersPayload([
        new BlockedNumberPayload('33601020304', 'IN', 'EQUALS', 'BLOCK'),
        new BlockedNumberPayload(
            '33601020304',
            'IN',// IN|OUT
            'EQUALS',// EQUALS|STARTSWITH
            'BLOCK',// BLOCK|ALLOW
            [
                new RuleBlockedNumberPayload(
                    ['link_id', 'other_link_id'],
                    'time_template',
                    'BLOCK',// BLOCK|ALLOW
                )
            ],
            '33601020305',// change number
            'OUT',
            'STARTSWITH',// change operator
            'ALLOW',
            'OVERWRITE',// if exists
        ),
    ]);

    // true if ok else BadResponseReturnException
    $result = $updateBlockedNumbers->executeQuery($payload);
}
```

# DeleteBlockNumbers

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\DeleteBlockNumbersInterface;

public function example(DeleteBlockNumbersInterface $deleteBlockNumbers)
{
    // true if ok else BadResponseReturnException
    $result = $deleteBlockNumbers->executeQuery([DeleteBlockNumbersInterface::QUERY_PARAMETER_TIME_BLOCK_NUMBERS => '339;IN;STARTSWITH,334;OUT;EQUALS']); 
}
```

# GetVariableRulesOfTemplate

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\GetVariableRulesOfTemplateInterface;

public function example(GetVariableRulesOfTemplateInterface $getVariableRulesOfTemplate)
{
    $variablesRulesOfTemplate = $getVariableRulesOfTemplate->executeQuery($options);
}
```
see [GetVariableRulesOfTemplate](../../src/Api/Calling/Rules/GetVariableRulesOfTemplate.php) for available options
