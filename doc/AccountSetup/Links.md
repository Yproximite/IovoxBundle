# GetLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\GetLinks;

public function example(GetLinks $getLinks)
{
    $links = $getLinks->executeQuery($options); 
} 
```

see [GetLinks](../../src/Api/AccountSetup/Links/GetLinks.php) for available options

# CreateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\CreateLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(CreateLinks $createLinks)
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

# UpdateLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\UpdateLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\LinksPayload;

public function example(UpdateLinks $updateLinks)
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

# DeleteLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\DeleteLinks;

public function example(DeleteLinks $deleteLinks)
{
    // true if ok else BadResponseReturnException
    $result = $deleteLinks->executeQuery([DeleteLinks::QUERY_PARAMETER_LINK_IDS => 'link_id_1,link_id_2']); 
}
```

see [DeleteLinks](../../src/Api/AccountSetup/Links/DeleteLinks.php) for available options

# AttachVoxnumberToLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachVoxnumberToLink;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachVoxnumberToLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\VoxNumberPayload;

public function example(AttachVoxnumberToLink $attachVoxnumberToLink)
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

# RemoveVoxnumberFromLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveVoxnumberFromLink;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveVoxnumberFromLinkPayload;

public function example(RemoveVoxnumberFromLink $removeVoxnumberFromLink)
{
    $payload = new RemoveVoxnumberFromLinkPayload(['link_id', 'link_id', 'link_id']);

    // true if ok else BadResponseReturnException
    $result = $removeVoxnumberFromLink->executeQuery($payload);
}
```

# AttachRuleTemplateToLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachRuleTemplateToLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\ContactRulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\RulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\SoundFilesRulePayload;

public function example(AttachRuleTemplateToLinks $attachRuleTemplateToLinks)
{
    $payload = new AttachRuleTemplateToLinksPayload(
        'template_name',
        'TRUE',// overwrite_existing TRUE|FALSE
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
                'record_call',// TRUE|FALSE
            ),
        ]
    );

    // true if ok else BadResponseReturnException
    $result = $attachRuleTemplateToLinks->executeQuery($payload);
}
```

# RemoveRuleTemplateFromLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveRuleTemplateFromLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveRuleTemplateFromLinksPayload;

public function example(RemoveRuleTemplateFromLinks $removeRuleTemplateFromLinks)
{
    $payload = new RemoveRuleTemplateFromLinksPayload(['link_id', 'link_id']);

    // true if ok else BadResponseReturnException
    $result = $removeRuleTemplateFromLinks->executeQuery($payload);
}
```

# AttachSMSTemplateToLinks

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachSMSTemplateToLinks;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\ContactRulePayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\RulePayload;

public function example(AttachSMSTemplateToLinks $attachSMSTemplateToLinks)
{
    $payload = new AttachSMSTemplateToLinksPayload(
        'template_name',
        'TRUE',// overwrite_existing TRUE|FALSE
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

# AttachCategoryToLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\AttachCategoryToLink;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachCategoryToLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\CategoryPayload;

public function example(AttachCategoryToLink $attachCategoryToLink)
{
    $payload = new AttachCategoryToLinkPayload([
        new CategoryPayload('link_id', 'category_id', 'parent_category_id'),
    ]);

    // true if ok else BadResponseReturnException
    $result = $attachCategoryToLink->executeQuery($payload);
}
```

# RemoveCategoryFromLink

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Links\RemoveCategoryFromLink;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\RemoveCategoryFromLinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\CategoryPayload;

public function example(RemoveCategoryFromLink $removeCategoryFromLink)
{
    $payload = new RemoveCategoryFromLinkPayload([
        new CategoryPayload('link_id', 'category_id'),
    ]);

    // true if ok else BadResponseReturnException
    $result = $removeCategoryFromLink->executeQuery($payload);
}
```

