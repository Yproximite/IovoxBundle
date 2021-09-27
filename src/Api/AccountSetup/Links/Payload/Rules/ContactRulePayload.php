<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachSMSTemplateToLinksPayload;

class ContactRulePayload
{
    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?string $contactId;

    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH, AttachSMSTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public ?string $phoneNumber;

    public function __construct(?string $contactId = null, ?string $phoneNumber = null)
    {
        $this->contactId   = $contactId;
        $this->phoneNumber = $phoneNumber;
    }
}
