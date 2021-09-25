<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\LimitIntegerErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\LimitIntervalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\OutputInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\PageIntegerErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\LimitQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\OutputQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\PageQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Model\Purchase\GetVoxnumberRegionsModel;

/**
 * @see https://docs.iovox.com/display/RA/getVoxnumberRegions
 */
class GetVoxnumberRegions extends AbstractPurchase
{
    public const QUERY_PARAMETER_NUMBER_TYPE  = 'number_type';
    public const QUERY_PARAMETER_AREA_CODE    = 'area_code';
    public const QUERY_PARAMETER_COUNTRY_CODE = 'country_code';
    public const QUERY_PARAMETER_REQ_FIELDS   = 'req_fields';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetVoxnumberRegionsModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetVoxnumberRegionsModel::create($response->toArray());
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_GET;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            PageQueryParameter::getParameterName()  => new PageQueryParameter(),
            LimitQueryParameter::getParameterName() => new LimitQueryParameter(),
            static::QUERY_PARAMETER_NUMBER_TYPE     => new GenericQueryParameter(static::QUERY_PARAMETER_NUMBER_TYPE, GenericQueryParameter::TYPE_STRING, 'Returns the Regions Details for the current region selected. number_type can be NATIONAL, GEOGRAPHIC, TOLLFREE'),
            static::QUERY_PARAMETER_AREA_CODE       => new GenericQueryParameter(static::QUERY_PARAMETER_AREA_CODE, GenericQueryParameter::TYPE_STRING, 'Returns the Regions Details for the country_code selected.'),
            static::QUERY_PARAMETER_COUNTRY_CODE    => new GenericQueryParameter(static::QUERY_PARAMETER_COUNTRY_CODE, GenericQueryParameter::TYPE_STRING, 'Returns the Regions Details for the area_code selected.'),
            static::QUERY_PARAMETER_REQ_FIELDS      => new GenericQueryParameter(static::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response.ac=Area Code,cc=Country Code ,con=Country Name, stn=State Name, cin=City Name,ct=Cost'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getVoxnumberRegions'),
            OutputQueryParameter::getParameterName()  => new OutputQueryParameter(),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new PageIntegerErrorResult(),
            new LimitIntegerErrorResult(),
            new LimitIntervalErrorResult(),
            new OutputInvalidErrorResult(),
            new InternalErrorResult(),
        ];
    }
}
