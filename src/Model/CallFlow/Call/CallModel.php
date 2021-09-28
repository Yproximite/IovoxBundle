<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Call;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class CallModel extends AbstractModel
{
    private function __construct(
        public ?string $id,
        public ?string $label,
        public int $timeout,
        public bool $record,
        public ?string $recordingLabel,
        public ?string $recordCallNotificationLabel,
        public string $sendCallAlert,
        public ?string $callAlertFromName,
        public ?string $callAlertEmailTemplateName,
        public ?string $destinationPhoneNumber,
        public ?string $destinationContactId,
        public ?string $destinationContactName,
        public ?CallerMessageModel $callerMessage,
        public ?CalledMessageModel $calledMessage,
        public ?EventHandlersModel $eventHandlers,
    ) {
    }

    public static function create(array $opts): self
    {
        $callAttributes = $opts['@attributes'];

        return new self(
            $callAttributes['id'] ?? null,
            $callAttributes['label'] ?? null,
            (int) $callAttributes['timeout'],
            $callAttributes['record'] === 'true',
            $callAttributes['recordingLabel'] ?? null,
            $callAttributes['recordCallNotificationLabel'] ?? null,
            $callAttributes['sendCallAlert'] ?? null,
            $callAttributes['callAlertFromName'] ?? null,
            $callAttributes['callAlertEmailTemplateName'] ?? null,
            $callAttributes['destinationPhoneNumber'] ?? null,
            $callAttributes['destinationContactId'] ?? null,
            $callAttributes['destinationContactName'] ?? null,
            (null !== $callerMessage = ($opts['callerMessage'] ?? null)) ? CallerMessageModel::create($callerMessage) : null,
            (null !== $calledMessage = ($opts['calledMessage'] ?? null)) ? CalledMessageModel::create($calledMessage) : null,
            EventHandlersModel::create($opts['eventHandlers'])
        );
    }
}
