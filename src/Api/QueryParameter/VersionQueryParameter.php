<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class VersionQueryParameter extends GenericQueryParameter
{
    public const CURRENT_VERSION = 3;

    public function __construct()
    {
        parent::__construct(static::getParameterName(), GenericQueryParameter::TYPE_INTEGER, 'API version to use', true, static::CURRENT_VERSION);
    }

    public static function getParameterName(): string
    {
        return 'v';
    }
}
