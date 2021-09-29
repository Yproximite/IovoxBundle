<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase;

use Yproximite\IovoxBundle\Model\Purchase\GetVoxnumberRegionsModel;

interface GetVoxnumberRegionsInterface
{
    public const QUERY_PARAMETER_NUMBER_TYPE  = 'number_type';
    public const QUERY_PARAMETER_AREA_CODE    = 'area_code';
    public const QUERY_PARAMETER_COUNTRY_CODE = 'country_code';
    public const QUERY_PARAMETER_REQ_FIELDS   = 'req_fields';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, number_type?: non-empty-string, area_code?: non-empty-string, country_code?: non-empty-string, req_fields?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetVoxnumberRegionsModel;
}
