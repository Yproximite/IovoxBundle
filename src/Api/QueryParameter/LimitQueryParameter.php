<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class LimitQueryParameter extends GenericQueryParameter
{
    public function __construct()
    {
        parent::__construct(static::getParameterName(), GenericQueryParameter::TYPE_INTEGER, 'Determines how many results to return. Use together with page to achieve paginated results. Maximum here is 20000');
    }

    public static function getParameterName(): string
    {
        return 'limit';
    }
}
