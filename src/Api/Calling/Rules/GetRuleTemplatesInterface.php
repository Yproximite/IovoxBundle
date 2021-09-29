<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Model\Rules\GetRuleTemplatesModel;

interface GetRuleTemplatesInterface
{
    public const QUERY_PARAMETER_ORDER         = 'order';
    public const QUERY_PARAMETER_REQ_FIELDS    = 'req_fields';
    public const QUERY_PARAMETER_TEMPLATE_NAME = 'template_name';
    public const QUERY_PARAMETER_TEMPLATE_TYPE = 'template_type';
    public const QUERY_PARAMETER_ADVANCED      = 'advanced';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, order?: non-empty-string, req_fields?: non-empty-string, template_name?: non-empty-string, template_type?: non-empty-string, advanced?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetRuleTemplatesModel;
}
