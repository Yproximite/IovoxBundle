<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Contacts;

use Yproximite\IovoxBundle\Enum\BooleanString;

interface DeleteContactsInterface
{
    public const QUERY_PARAMETER_CONTACT_IDS = 'contact_ids';
    public const QUERY_PARAMETER_RM_RULES    = 'rm_rules';
    public const QUERY_PARAMETER_RM_IF_USER  = 'rm_if_user';

    /**
     * @param array{ contact_ids: non-empty-string, rm_rules?: BooleanString::*, rm_if_user?: BooleanString::* } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
