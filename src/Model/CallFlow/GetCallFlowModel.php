<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow;

use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\CallFlowModel;
use Yproximite\IovoxBundle\Model\CallFlow\Email\EmailFlowModel;
use Yproximite\IovoxBundle\Model\CallFlow\Sms\SmsFlowModel;

class GetCallFlowModel extends AbstractModel
{
    public function __construct(public ?CallFlowModel $callFlowModel, public ?SmsFlowModel $smsFlowModel, public ?EmailFlowModel $emailFlowModel)
    {
    }

    public static function create(array $opts): self
    {
        return new self(
            null !== ($opts['callFlow'] ?? null) ? CallFlowModel::create($opts) : null,
            null !== ($opts['smsFlow'] ?? null) ? SmsFlowModel::create($opts) : null,
            null !== ($opts['emailFlow'] ?? null) ? EmailFlowModel::create($opts) : null,
        );
    }
}
