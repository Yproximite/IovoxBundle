<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Sms;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class SmsFlowModel extends AbstractModel
{
    /**
     * @param Collection<int, SendSmsModel> $sendSms
     */
    private function __construct(public ?string $name, public ?string $notes, public Collection $sendSms)
    {
    }

    public static function create(array $opts): self
    {
        $smsFlow           = $opts['smsFlow'];
        $smsFlowAttributes = $smsFlow['@attributes'];

        return new self(
            $smsFlowAttributes['name'] ?? null,
            $smsFlowAttributes['notes'] ?? null,
            (new ArrayCollection(static::formatResult($smsFlow['sendSms'], false)))->map(fn($v): SendSmsModel => SendSmsModel::create($v))
        );
    }
}
