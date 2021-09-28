<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

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
use Yproximite\IovoxBundle\Model\Contacts\GetContactsModel;

/**
 * @see https://docs.iovox.com/display/RA/getContacts
 */
class GetContacts extends AbstractContacts
{
    public const QUERY_PARAMETER_ORDER        = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS   = 'req_fields';
    public const QUERY_PARAMETER_CONTACT_ID   = 'contact_id';
    public const QUERY_PARAMETER_DISPLAY_NAME = 'display_name';
    public const QUERY_PARAMETER_COMPANY      = 'company';
    public const QUERY_PARAMETER_PHONE_NUMBER = 'phone_number';
    public const QUERY_PARAMETER_EMAIL        = 'email';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetContactsModel
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return GetContactsModel::create($response->toArray());
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
            self::QUERY_PARAMETER_ORDER             => new GenericQueryParameter(self::QUERY_PARAMETER_ORDER, GenericQueryParameter::TYPE_STRING, 'Determines which field to order the output result by. Use a field name from the req_fields list and suffix with _ASC or _DESC for ascending or descending respectively. For example, "od_DESC" will return results ordered by order_date with the most recent first'),
            self::QUERY_PARAMETER_REQ_FIELDS        => new GenericQueryParameter(self::QUERY_PARAMETER_REQ_FIELDS, GenericQueryParameter::TYPE_STRING, 'Comma separated list of abbreviated fields to return in response.cid=contact_id, dn=display_name, comp=Company, em=Email, bphone=business_phone,as=assigned_status'),
            self::QUERY_PARAMETER_CONTACT_ID        => new GenericQueryParameter(self::QUERY_PARAMETER_CONTACT_ID, GenericQueryParameter::TYPE_STRING, 'Returns the Contact with the specified Contact ID'),
            self::QUERY_PARAMETER_DISPLAY_NAME      => new GenericQueryParameter(self::QUERY_PARAMETER_DISPLAY_NAME, GenericQueryParameter::TYPE_STRING, 'Returns the Contacts which contains the display name'),
            self::QUERY_PARAMETER_COMPANY           => new GenericQueryParameter(self::QUERY_PARAMETER_COMPANY, GenericQueryParameter::TYPE_STRING, 'Returns the Contacts with the specified Company'),
            self::QUERY_PARAMETER_PHONE_NUMBER      => new GenericQueryParameter(self::QUERY_PARAMETER_PHONE_NUMBER, GenericQueryParameter::TYPE_STRING, 'Returns the Contacts with the specified Phone Number'),
            self::QUERY_PARAMETER_EMAIL             => new GenericQueryParameter(self::QUERY_PARAMETER_EMAIL, GenericQueryParameter::TYPE_STRING, 'Returns the Contacts with the specified email'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('getContacts'),
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
