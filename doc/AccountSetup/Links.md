# GetLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\GetLinksInterface;

public function example(GetLinksInterface $getLinks)
{
    $links = $getLinks->executeQuery($options); 
} 
```

see [GetLinks](../../src/Api/AccountSetup/Links/GetLinks.php) for available options

# CreateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\CreateLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(CreateLinksInterface $createLinks)
{
    $payload = new LinksPayload([
        new LinkPayload('node_id', 'link_id', 'link_name', 'link_type'),
        new LinkPayload(
            'node_id',
            'link_id',
            'link_name',
            'link_type',
            '2020-10-20',// link_date
            0// click_to_call 0|1
        ),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createLinks->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\CreateLinksInterface;

public function example(CreateLinksInterface $createLinks)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <link>
        <node_id>12ABC34</node_id>
        <link_id>1234</link_id>
        <link_name>House Buyer Mag</link_name>
        <link_type>Magazine Advertisement</link_type>
        <link_date>2008-11-19 14:10:46</link_date>
        <click_to_call>1</click_to_call>
    </link>
    <link>
       ...
    <link>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createLinks->executeXmlStringQuery($xmlString); 
}
```

# UpdateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\UpdateLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(UpdateLinksInterface $updateLinks)
{
    $payload = new LinksPayload([
        new LinkPayload(null, 'link_id', 'link_name', 'link_type'),
        new LinkPayload(
            null,
            'link_id',
            'link_name',
            'link_type',
            '2020-10-20',// link_date
            0,// click_to_call 0|1
            'new_link_id'
        ),
    ]);

    // true if ok else BadResponseReturnException
    $result = $updateLinks->executeQuery($payload);
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\UpdateLinksInterface;

public function example(UpdateLinksInterface $updateLinks)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <link>
         <link_id>ext1</link_id>
         <new_link_id>ext12</new_link_id>
         <link_name>My updated Link Name</link_name>
         <link_type>My updated Link Type</link_type>
         <click_to_call>1</click_to_call>
         <link_date>2008-11-19 14:10:46</link_date>
     </link>
     <link>
         ...
     </link>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateLinks->executeXmlStringQuery($xmlString); 
}
```

# DeleteLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\DeleteLinksInterface;

public function example(DeleteLinksInterface $deleteLinks)
{
    // true if ok else BadResponseReturnException
    $result = $deleteLinks->executeQuery([DeleteLinksInterface::QUERY_PARAMETER_LINK_IDS => 'link_id_1,link_id_2']); 
}
```

see [DeleteLinks](../../src/Api/AccountSetup/Links/DeleteLinks.php) for available options

# AttachVoxnumberToLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachVoxnumberToLinkInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachVoxnumberToLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\VoxNumberPayload;

public function example(AttachVoxnumberToLinkInterface $attachVoxnumberToLink)
{
    $payload = new AttachVoxnumberToLinkPayload([
        new VoxNumberPayload('link_id', 'BY AREA',33/* voxnumberIdd */,9/* areaCode */),
        new VoxNumberPayload('link_id', 'BY VOXNUMBER', null, null, 33492393368/* fullVoxnumber */),
        new VoxNumberPayload('link_id', 'BY POSTCODE', null, null, null, 'FRANCE'/* country FRANCE|UNITED KINGDOM */, '69000'/* postcode */),
    ]);

    // true if ok else BadResponseReturnException
    $result = $attachVoxnumberToLink->executeQuery($payload);
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachVoxnumberToLinkInterface;

public function example(AttachVoxnumberToLinkInterface $attachVoxnumberToLink)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <link>
         <link_id>444</link_id>
         <method>BY VOXNUMBER</method>
         <full_voxnumber>4423012565866</full_voxnumber>
     </link>
</request>
XML;

    // true if ok else BadResponseReturnException
    $result = $attachVoxnumberToLink->executeXmlStringQuery($xmlString);
}
```

# RemoveVoxnumberFromLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveVoxnumberFromLinkInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveVoxnumberFromLinkPayload;

public function example(RemoveVoxnumberFromLinkInterface $removeVoxnumberFromLink)
{
    $payload = new RemoveVoxnumberFromLinkPayload(['link_id', 'link_id', 'link_id']);

    // true if ok else BadResponseReturnException
    $result = $removeVoxnumberFromLink->executeQuery($payload);
}
```

# AttachRuleTemplateToLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachRuleTemplateToLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\ContactRulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\RulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\SoundFilesRulePayload;
use Yproximite\IovoxBundle\Enum\BooleanString;

public function example(AttachRuleTemplateToLinksInterface $attachRuleTemplateToLinks)
{
    $payload = new AttachRuleTemplateToLinksPayload(
        'template_name',
        BooleanString::TRUE,// overwrite_existing TRUE|FALSE
        ['link_id', 'link_id'],
        [
            new RulePayload(
                'rule_id',
                'rule_type',
                'rule_label',
                new SoundFilesRulePayload(['sound_group|sound_label']),// sounds_files
            ),
            new RulePayload(
                'rule_id',
                'rule_type',
                'rule_label',
                new SoundFilesRulePayload(['sound_group|sound_label']),// sounds_files
                new SoundFilesRulePayload(['sound_group|sound_label']),// play
                new ContactRulePayload('contact_id', 'one_phone_number_on_contact_id'),
                new SoundFilesRulePayload(['sound_group|sound_label']),// caller_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// called_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// voice_mail_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// completed_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// failure_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// no_key_message
                new SoundFilesRulePayload(['sound_group|sound_label']),// unmatched_message
                'send_call_alert',// NONE|MISSED_CALLS|MISSED_CALLS_NO_WITHHELD|ALL_CALLS
                BooleanString::FALSE,// record_call TRUE|FALSE
            ),
        ]
    );

    // true if ok else BadResponseReturnException
    $result = $attachRuleTemplateToLinks->executeQuery($payload);
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachRuleTemplateToLinksInterface;

public function example(AttachRuleTemplateToLinksInterface $attachRuleTemplateToLinks)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <template_name>Call Whisper Both</template_name>
    <overwrite_existing>TRUE</overwrite_existing>
    <link_ids>
         <link_id>100</link_id>
         <link_id>130</link_id>
         <link_id>200</link_id>
    </link_ids>
    <rules_variable>
        <rule>
            <rule_id>1</rule_id>
            <rule_type>play</rule_type>
            <rule_label>Welcome</rule_label>
            <sound_files>
                <sound_file>Sound Group 1|whisper caller</sound_file>
            </sound_files>
        </rule>
        <rule>
            <rule_id>2</rule_id>
            <rule_type>messageKeypress</rule_type>
            <rule_label>Options</rule_label>
            <play>
                <sound_files>
                    <sound_file>Sound Group 1|whisper called</sound_file>
                    <sound_file>Sound Group 2|whisper caller</sound_file>
                </sound_files>
            </play>
        </rule>
    </rules_variable>
</request>
XML;

    // true if ok else BadResponseReturnException
    $result = $attachRuleTemplateToLinks->executeXmlStringQuery($xmlString);
}
```

# RemoveRuleTemplateFromLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveRuleTemplateFromLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveRuleTemplateFromLinksPayload;

public function example(RemoveRuleTemplateFromLinksInterface $removeRuleTemplateFromLinks)
{
    $payload = new RemoveRuleTemplateFromLinksPayload(['link_id', 'link_id']);

    // true if ok else BadResponseReturnException
    $result = $removeRuleTemplateFromLinks->executeQuery($payload);
}
```

# AttachSMSTemplateToLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachSMSTemplateToLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\ContactRulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\RulePayload;
use Yproximite\IovoxBundle\Enum\BooleanString;

public function example(AttachSMSTemplateToLinksInterface $attachSMSTemplateToLinks)
{
    $payload = new AttachSMSTemplateToLinksPayload(
        'template_name',
        BooleanString::FALSE,// overwrite_existing TRUE|FALSE
        ['link_id', 'link_id'],
        [
            new RulePayload(
                'rule_id',
                'rule_type',
                'rule_label',
                null,
                null,
                new ContactRulePayload('contact_id', 'one_phone_number_on_contact_id'),
            ),
        ]
    );

    // true if ok else BadResponseReturnException
    $result = $attachSMSTemplateToLinks->executeQuery($payload);
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachSMSTemplateToLinksInterface;

public function example(AttachSMSTemplateToLinksInterface $attachSMSTemplateToLinks)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <template_name>SMS</template_name>
    <overwrite_existing>TRUE</overwrite_existing>
    <link_ids>
        <link_id>100</link_id>
        <link_id>130</link_id>
        <link_id>200</link_id>
    </link_ids>
    <rules_variable>
        <rule>
            <rule_id>sendSms_1</rule_id>
            <rule_type>sendSms</rule_type>
            <rule_label>sendSms</rule_label>
            <contact>
                <contact_id>1</contact_id>
                <phone_number>4420754545454</phone_number>
            </contact>
        </rule>
    </rules_variable>
</request>
XML;

    // true if ok else BadResponseReturnException
    $result = $attachSMSTemplateToLinks->executeXmlStringQuery($xmlString);
}
```

# RemoveSMSTemplateFromLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveSMSTemplateFromLinksInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveSMSTemplateFromLinksPayload;

public function example(RemoveSMSTemplateFromLinksInterface $removeSMSTemplateFromLinks)
{
    $payload = new RemoveSMSTemplateFromLinksPayload(['link_id', 'link_id']);

    // true if ok else BadResponseReturnException
    $result = $removeSMSTemplateFromLinks->executeQuery($payload);
}
```

# AttachCategoryToLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachCategoryToLinkInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachCategoryToLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\CategoryPayload;

public function example(AttachCategoryToLinkInterface $attachCategoryToLink)
{
    $payload = new AttachCategoryToLinkPayload([
        new CategoryPayload('link_id', 'category_id', 'parent_category_id'),
    ]);

    // true if ok else BadResponseReturnException
    $result = $attachCategoryToLink->executeQuery($payload);
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachCategoryToLinkInterface;

public function example(AttachCategoryToLinkInterface $attachCategoryToLink)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <link>
        <link_id>333</link_id>
        <parent_category_id>231</parent_category_id>
        <category_id>123</category_id>
        <value>Marketing</value>
    </link>
    <link>
        <link_id>333</link_id>
        <parent_category_id>124</parent_category_id>
        <category_id>124</category_id>
        <value>Golden</value>
    </link>
    <link>
        <link_id>444</link_id>
        <parent_category_id>200</parent_category_id>
        <category_id>230</category_id>
        <value>London</value>
    </link>
</request>
XML;

    // true if ok else BadResponseReturnException
    $result = $attachCategoryToLink->executeXmlStringQuery($xmlString);
}
```

# RemoveCategoryFromLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveCategoryFromLinkInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveCategoryFromLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\CategoryPayload;

public function example(RemoveCategoryFromLinkInterface $removeCategoryFromLink)
{
    $payload = new RemoveCategoryFromLinkPayload([
        new CategoryPayload('link_id', 'category_id'),
    ]);

    // true if ok else BadResponseReturnException
    $result = $removeCategoryFromLink->executeQuery($payload);
}
```

