<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules\Payload;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class TimeTemplatesPayload
{
    public const GROUP_CREATE = 'time_templates_create';
    public const GROUP_UPDATE = 'time_templates_update';

    /** @var array<int, TimeTemplatePayload> */
    #[SerializedName('time_template')]
    #[Groups(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    #[Assert\Valid(groups: [self::GROUP_CREATE, self::GROUP_UPDATE])]
    public array $timeTemplates;

    /**
     * @param array<int, TimeTemplatePayload> $timeTemplates
     */
    public function __construct(array $timeTemplates = [])
    {
        $this->timeTemplates = $timeTemplates;
    }
}
