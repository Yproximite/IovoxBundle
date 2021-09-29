<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Countries;

use Yproximite\IovoxBundle\Model\Countries\GetCountriesModel;

interface GetCountriesInterface
{
    /**
     * @param array{ page?: positive-int, limit?: positive-int } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetCountriesModel;
}
