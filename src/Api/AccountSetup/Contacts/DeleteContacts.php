<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\QueryParameter\GenericQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

/**
 * @see https://docs.iovox.com/display/RA/deleteContacts
 */
class DeleteContacts extends AbstractContacts
{
    public const QUERY_PARAMETER_CONTACT_IDS = 'contact_ids';
    public const QUERY_PARAMETER_RM_RULES    = 'rm_rules';
    public const QUERY_PARAMETER_RM_IF_USER  = 'rm_if_user';

    /**
     * @param array<string, string|int> $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool
    {
        $query    = $this->createQuery($queryParameters);
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_NO_CONTENT === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_DELETE;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [
            static::QUERY_PARAMETER_CONTACT_IDS => new GenericQueryParameter(static::QUERY_PARAMETER_CONTACT_IDS, GenericQueryParameter::TYPE_STRING, 'A comma delimited list of all contact ids of the contacts to be deleted', true),
            static::QUERY_PARAMETER_RM_RULES    => new GenericQueryParameter(static::QUERY_PARAMETER_RM_RULES, GenericQueryParameter::TYPE_BOOLEAN, "TRUE/FALSE. If set to TRUE and the contact's details form part of a custom Rule Template the Template will be deleted and removed from any Links it is attached to. Also, if the contact's details have been used to fix a variable rule the related template will be detached from any Links using these details. If set to FALSE and the contact's details are used in a Rule Template or to fix a variable Rule, an error will be thrown"),
            static::QUERY_PARAMETER_RM_IF_USER  => new GenericQueryParameter(static::QUERY_PARAMETER_RM_IF_USER, GenericQueryParameter::TYPE_BOOLEAN, 'TRUE/FALSE. If set to TRUE and the contact has a user account then the user will also be removed. If set to FALSE and the contact has a user account, an error will be thrown'),
        ];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('deleteContacts'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new InternalErrorResult(),
        ];
    }
}
