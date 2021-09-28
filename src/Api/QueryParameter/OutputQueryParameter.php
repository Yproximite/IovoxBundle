<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class OutputQueryParameter extends GenericQueryParameter
{
    public const XML  = 'XML';
    public const JSON = 'JSON';

    public function __construct()
    {
        parent::__construct(static::getParameterName(), GenericQueryParameter::TYPE_STRING, 'Specifying XML or JSON returns data in XML or JSON format', true, static::JSON);
    }

    public static function getParameterName(): string
    {
        return 'output';
    }
}
