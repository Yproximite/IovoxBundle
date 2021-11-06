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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\CreateTimeTemplatesInterface;

public function example(CreateTimeTemplatesInterface $createTimeTemplates)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<request>
     <time_template><!-- Every Monday to Thursday between 9am and 6pm during all 2012    -->
         <label>Working hours in 2012</label>
         <time_frames>
             <time_frame>
                 <date_from>2012-01-01</date_from>
                 <date_to>2012-12-31</date_to>
                 <recurrence>NONE</recurrence>
                 <time_from>09:00</time_from>
                 <time_to>18:00</time_to>
                 <days>
                     <day>MON</day>
                     <day>TUE</day>
                     <day>WED</day>
                     <day>THU</day>
                 </days>
             </time_frame>
         </time_frames>
     </time_template>
     <time_template><!-- Every Monday morning and Friday afternoon during January 2012 -->
         <label>Template 2</label>
         <time_frames>
             <time_frame>
                 <date_from>2012-01-01</date_from>
                 <date_to>2012-01-31</date_to>
                 <recurrence>NONE</recurrence>
                 <time_from>09:00</time_from>
                 <time_to>12:00</time_to>
                 <days>
                     <day>MON</day>
                 </days>
             </time_frame>
             <time_frame>
                 <date_from>2012-01-01</date_from>
                 <date_to>2012-01-31</date_to>
                 <recurrence>NONE</recurrence>
                 <time_from>12:00</time_from>
                 <time_to>18:00</time_to>
                 <days>
                     <day>FRI</day>
                 </days>
             </time_frame>
         </time_frames>
     </time_template>
     <time_template><!-- Every 1st of each month (Any day of the week) -->
         <label>Template 3</label>
         <time_frames>
             <time_frame>
                 <date_from>2012-01-01</date_from>
                 <date_to>2012-01-01</date_to>
                 <recurrence>MONTHLY</recurrence>
                 <days>
                     <day>MON</day>
                     <day>TUE</day>
                     <day>WED</day>
                     <day>THU</day>
                     <day>FRI</day>
                     <day>SAT</day>
                     <day>SUN</day>
                 </days>
             </time_frame>
         </time_frames>
     </time_template>
     <time_template><!-- Christmas day every year -->
         <label>Template 4</label>
         <time_frames>
             <time_frame>
                 <date_from>2012-12-25</date_from>
                 <date_to>2012-12-25</date_to>
                 <recurrence>YEARLY</recurrence>
                 <days>
                     <day>MON</day>
                     <day>TUE</day>
                     <day>WED</day>
                     <day>THU</day>
                     <day>FRI</day>
                     <day>SAT</day>
                     <day>SUN</day>
                 </days>
             </time_frame>
         </time_frames>
     </time_template>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createTimeTemplates->executeXmlStringQuery($xmlString); 
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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\UpdateTimeTemplatesInterface;

public function example(UpdateTimeTemplatesInterface $updateTimeTemplates)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<request>
   <time_template>
     <label>Working hours in 2012</label>
     <new_label>New Working hours 2012</new_label>
     <time_frames>
       <time_frame>
         <date_from>2012-01-01</date_from>
         <date_to>2012-12-31</date_to>
         <recurrence>NONE</recurrence>
         <time_from>09:00</time_from>
         <time_to>18:00</time_to>
         <days>
           <day>MON</day>
           <day>TUE</day>
           <day>WED</day>
           <day>THU</day>
         </days>
       </time_frame>                          
       <time_frame>
         <date_from>2012-01-01</date_from>
         <date_to>2012-12-31</date_to>
         <recurrence>NONE</recurrence>
         <time_from>09:00</time_from>
         <time_to>18:00</time_to>
         <days>
           <day>FRI</day>
         </days>
       </time_frame>
     </time_frames>
   </time_template>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateTimeTemplates->executeXmlStringQuery($xmlString); 
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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\CreateBlockedNumbersInterface;

public function example(CreateBlockedNumbersInterface $createBlockedNumbers)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <blocked_number> <!-- Block all calls from this number at all times to all Links -->
        <number>447429651520</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>BLOCK</default>
        <rules />
    </blocked_number>
    <blocked_number> <!-- Block all outbound calls to France -->
        <number>33</number>
        <in_or_out>OUT</in_or_out>
        <operator>STARTSWITH</operator>
        <default>BLOCK</default>
        <rules />
    </blocked_number>
    <blocked_number> <!-- Allow all calls from this number irrespective of Link and Time of Call -->
        <number>447429651521</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>ALLOW</default>
        <rules />
    </blocked_number>
    <blocked_number> <!-- Block all calls from this number, but allow if call is to Link IDs 32 and 33 during Christmas Time Template or at any time to Link IDs 34 or 35 -->
        <number>447429651522</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>BLOCK</default>
        <rules>
            <rule>
                <link_ids>
                    <link_id>32</link_id>
                    <link_id>33</link_id>
                </link_ids>
                <time_template>Christmas</time_template>
                <blocking_type>ALLOW</blocking_type>
            </rule>
            <rule>
                <link_ids>
                    <link_id>34</link_id>
                    <link_id>35</link_id>
                </link_ids>
                <time_template />
                <blocking_type>ALLOW</blocking_type>
            </rule>
        </rules>
    </blocked_number>
    <blocked_number> <!-- Allow all calls from this number, but block if calling Link IDs 32 and 33 during Christmas Time Template or Link IDs 34 and 35 at any time -->
        <number>447429651523</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>ALLOW</default>
        <rules>
            <rule>
                <link_ids>
                    <link_id>32</link_id>
                    <link_id>33</link_id>
                </link_ids>
                <time_template>Christmas</time_template>
                <blocking_type>BLOCK</blocking_type>
            </rule>
            <rule>
                <link_ids>
                    <link_id>34</link_id>
                    <link_id>35</link_id>
                </link_ids>
                <time_template />
                <blocking_type>BLOCK</blocking_type>
            </rule>
        </rules>
    </blocked_number>
    <blocked_number> <!-- Allow all calls from WITHHELD but block if it is during Christmas Time Template and calling Link IDs 36 and 37 -->
        <number>WITHHELD</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>ALLOW</default>
        <rules>
            <rule>
                <link_ids>
                    <link_id>36</link_id>
                    <link_id>37</link_id>
                </link_ids>
                <time_template>Christmas</time_template>
                <blocking_type>BLOCK</blocking_type>
            </rule>
        </rules>
    </blocked_number>
    <blocked_number> <!-- Block all calls from WITHHELD but allow if it is during Christmas Time Template and calling Link IDs 38 and 39 -->
        <number>*</number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>BLOCK</default>
        <rules>
            <rule>
                <link_ids>
                    <link_id>38</link_id>
                    <link_id>39</link_id>
                </link_ids>
                <time_template>Christmas</time_template>
                <blocking_type>ALLOW</blocking_type>
            </rule>
        </rules>
    </blocked_number>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createBlockedNumbers->executeXmlStringQuery($xmlString); 
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

OR

```php
use Yproximite\IovoxBundle\Api\Calling\Rules\UpdateBlockedNumbersInterface;

public function example(UpdateBlockedNumbersInterface $updateBlockedNumbers)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <blocked_number>
        <number>447429651522</number> <!-- Update blocking rule number 447429651522 to 447429651521. If rules exist for 447429651521, overwrite them -->
        <new_number>447429651521</new_number>
        <in_or_out>IN</in_or_out>
        <operator>EQUALS</operator>
        <default>ALLOW</default>
        <if_exist>OVERWRITE</if_exist>
        <rules/>
    </blocked_number>
    <blocked_number>
        <number>447429651523</number> <!-- Update blocking rule number inbound calling to be outbound calling. If outbound rules exist for 447429651523, overwrite them with Block calls to Link ID 33 during the Weekend Time Template -->
        <in_or_out>IN</in_or_out>
        <new_in_or_out>OUT</new_in_or_out>
        <operator>EQUALS</operator>
        <new_operator>STARTSWITH</new_operator>
        <default>ALLOW</default>
        <if_exist>OVERWRITE</if_exist>
        <rules>
            <rule>
                <links>
                    <link_id>33</link_id>
                </links>
                <time_template>Weekends</time_template>
                <blocking_type>BLOCK</blocking_type>
            </rule>
        </rules>
    </blocked_number>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateBlockedNumbers->executeXmlStringQuery($xmlString); 
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
