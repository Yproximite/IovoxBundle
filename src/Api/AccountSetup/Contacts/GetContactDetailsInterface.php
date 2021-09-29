<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Model\Contacts\GetContactDetailsModel;

interface GetContactDetailsInterface
{
    public const QUERY_PARAMETER_CONTACT_ID = 'contact_id';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, contact_id: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetContactDetailsModel;
}
