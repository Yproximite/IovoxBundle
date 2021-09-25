<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Api\AbstractApi;

abstract class AbstractContacts extends AbstractApi
{
    protected function setEndpoint(): void
    {
        $this->endpoint = '/Contacts';
    }
}
