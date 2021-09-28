<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\QueryParameter;

class PageQueryParameter extends GenericQueryParameter
{
    public function __construct()
    {
        parent::__construct(static::getParameterName(), GenericQueryParameter::TYPE_INTEGER, 'The page number to return. Use together with limit to achieve paginated results');
    }

    public static function getParameterName(): string
    {
        return 'page';
    }
}
