<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules\RulePayloadInterface;

class AttachSMSTemplateToLinksPayload
{
    public const GROUP_ATTACH = 'sms_template_attach';

    #[Groups(groups: [self::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [self::GROUP_ATTACH])]
    public ?string $templateName;

    #[Groups(groups: [self::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [self::GROUP_ATTACH])]
    #[Assert\Choice(choices: ['TRUE', 'FALSE'], groups: [self::GROUP_ATTACH])]
    public ?string $overwriteExisting;

    /** @var array{ link_id?: array<int, string>} */
    #[SerializedName('link_ids')]
    #[Groups(groups: [self::GROUP_ATTACH])]
    public array $linkIds;

    /** @var array{ rule?: array<int, RulePayloadInterface>} */
    #[SerializedName('rules_variable')]
    #[Groups(groups: [self::GROUP_ATTACH])]
    public array $rules;

    /**
     * @param array<int, string>               $linkIds
     * @param array<int, RulePayloadInterface> $rules
     */
    public function __construct(?string $templateName = null, ?string $overwriteExisting = null, array $linkIds = [], array $rules = [])
    {
        $this->templateName      = $templateName;
        $this->overwriteExisting = $overwriteExisting;
        $this->linkIds           = ['link_id' => $linkIds];
        $this->rules             = ['rule' => $rules];
    }
}
