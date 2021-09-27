<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class RemoveRuleTemplateFromLinksPayload
{
    public const GROUP_REMOVE = 'rule_template_remove';

    /** @var array{ link_id: array<int, string>} */
    #[Groups(groups: [self::GROUP_REMOVE])]
    #[Assert\Valid(groups: [self::GROUP_REMOVE])]
    public array $linkIds;

    /**
     * @param array<int, string> $linkIds
     */
    public function __construct(array $linkIds)
    {
        $this->linkIds = ['link_id' => $linkIds];
    }
}
