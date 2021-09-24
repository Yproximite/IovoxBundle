<?php

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class MethodQueryParameter extends GenericQueryParameter
{
    public function __construct(string $defaultValue)
    {
        parent::__construct(static::getParameterName(), GenericQueryParameter::TYPE_STRING, 'Specifying XML or JSON returns data in XML or JSON format', true, $defaultValue);
    }

    public static function getParameterName(): string
    {
        return 'method';
    }
}
