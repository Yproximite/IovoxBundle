<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\Rules;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Yproximite\IovoxBundle\Api\AccountSetup\Links\Payload\AttachRuleTemplateToLinksPayload;

class SoundFilesRulePayload
{
    /** @var array{ sound_file: array<int, string>} */
    #[Groups(groups: [AttachRuleTemplateToLinksPayload::GROUP_ATTACH])]
    #[Assert\NotNull(groups: [])]
    public array $soundFiles;

    /**
     * @param array<int, string> $soundFiles
     */
    public function __construct(array $soundFiles = [])
    {
        $this->soundFiles = ['sound_file' => $soundFiles];
    }
}
