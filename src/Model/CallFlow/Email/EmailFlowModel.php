<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Email;

use Yproximite\IovoxBundle\Model\AbstractModel;

class EmailFlowModel extends AbstractModel
{
    private function __construct(public ?string $name, public ?string $notes, public ?SendEmailModel $sendSms)
    {
    }

    public static function create(array $opts): self
    {
        $emailFlow           = $opts['emailFlow'];
        $emailFlowAttributes = $emailFlow['@attributes'];

        return new self(
            $emailFlowAttributes['name'] ?? null,
            $emailFlowAttributes['notes'] ?? null,
            SendEmailModel::create($emailFlow['sendEmail'])
        );
    }
}
