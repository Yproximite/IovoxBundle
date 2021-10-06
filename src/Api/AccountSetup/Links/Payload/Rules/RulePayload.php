<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;

class RulePayload implements RulePayloadInterface
{
    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?string $ruleId;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?string $ruleType;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?string $ruleLabel;

    /** @var array{ sound_file: array<int, string>|null } */
    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public array $soundFiles;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $play;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?ContactRulePayload $contact;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $callerMessage;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $calledMessage;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $voicemailMessage;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $completedMessage;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $failureMessage;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $noKeyMessages;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?SoundFilesRulePayload $unmatchedMessages;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\Choice(choices: ['NONE', 'MISSED_CALLS', 'MISSED_CALLS_NO_WITHHELD', 'ALL_CALLS'], groups: [])]
    public ?string $sendCallAlert;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\Choice(choices: ['TRUE', 'FALSE'], groups: [])]
    public ?string $recordCall;

    /**
     * @param array<int, string>|null $soundFiles
     */
    public function __construct(
        ?string $ruleId = null,
        ?string $ruleType = null,
        ?string $ruleLabel = null,
        ?array $soundFiles = null,
        ?SoundFilesRulePayload $play = null,
        ?ContactRulePayload $contact = null,
        ?SoundFilesRulePayload $callerMessage = null,
        ?SoundFilesRulePayload $calledMessage = null,
        ?SoundFilesRulePayload $voicemailMessage = null,
        ?SoundFilesRulePayload $completedMessage = null,
        ?SoundFilesRulePayload $failureMessage = null,
        ?SoundFilesRulePayload $noKeyMessages = null,
        ?SoundFilesRulePayload $unmatchedMessages = null,
        ?string $sendCallAlert = null,
        ?string $recordCall = null,
    ) {
        $this->ruleId            = $ruleId;
        $this->ruleType          = $ruleType;
        $this->ruleLabel         = $ruleLabel;
        $this->soundFiles        = ['sound_file' => $soundFiles];
        $this->play              = $play;
        $this->contact           = $contact;
        $this->callerMessage     = $callerMessage;
        $this->calledMessage     = $calledMessage;
        $this->voicemailMessage  = $voicemailMessage;
        $this->completedMessage  = $completedMessage;
        $this->failureMessage    = $failureMessage;
        $this->noKeyMessages     = $noKeyMessages;
        $this->unmatchedMessages = $unmatchedMessages;
        $this->sendCallAlert     = $sendCallAlert;
        $this->recordCall        = $recordCall;
    }
}
