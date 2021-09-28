<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

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
use Yproximite\IovoxBundle\Model\Rules\GetTimeTemplatesModel;

/**
 * @see https://docs.iovox.com/display/RA/getTimeTemplates
 */
class GetTimeTemplates extends AbstractRules
{
    public const QUERY_PARAMETER_ORDER               = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS          = 'req_fields';
    public const QUERY_PARAMETER_TIME_TEMPLATE_LABEL = 'time_template_label';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetTimeTemplatesModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetTimeTemplatesModel::create($response->toArray());
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
            PageQueryParameter::getParameterName()      => new PageQueryParameter(),
            LimitQueryParameter::getParameterName()     => new LimitQueryParameter(),
            self::QUERY_PARAMETER_ORDER                 => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with ASC or DESC for ascending or descending respectively. For example, "lDESC" will return results ordered by label'),
            self::QUERY_PARAMETER_REQ_FIELDS            => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response. l=label, n=notes, tf=time_frames, c=created'),
            self::QUERY_PARAMETER_TIME_TEMPLATE_LABEL   => new GenericQueryParameter(self::QUERY_PARAMETER_TIME_TEMPLATE_LABEL, GenericQueryParameter::TYPE_STRING, 'Returns the TimeTemplates which have this label'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getTimeTemplates'),
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
