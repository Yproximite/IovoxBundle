<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

class SerializedXmlException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Cannot serialized data to xml.');
    }
}
