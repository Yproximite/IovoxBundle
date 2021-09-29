<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Model\Contacts\GetContactsModel;

interface GetContactsInterface
{
    public const QUERY_PARAMETER_ORDER        = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS   = 'req_fields';
    public const QUERY_PARAMETER_CONTACT_ID   = 'contact_id';
    public const QUERY_PARAMETER_DISPLAY_NAME = 'display_name';
    public const QUERY_PARAMETER_COMPANY      = 'company';
    public const QUERY_PARAMETER_PHONE_NUMBER = 'phone_number';
    public const QUERY_PARAMETER_EMAIL        = 'email';

    /**
     * @param array{page?: positive-int, limit?: positive-int, order?: non-empty-string, req_fields?: non-empty-string, contact_id?: non-empty-string, display_name?: non-empty-string, company?: non-empty-string, phone_number?: non-empty-string, email?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetContactsModel;
}
