<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Calling\Rules;

use Yproximite\IovoxBundle\Model\Rules\GetVariableRulesOfTemplateModel;

interface GetVariableRulesOfTemplateInterface
{
    public const QUERY_PARAMETER_TEMPLATE_NAME = 'template_name';
    public const QUERY_PARAMETER_LINK_ID       = 'link_id';

    /**
     * @param array{ page?: positive-int, limit?: positive-int, template_name?: non-empty-string, link_id?: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): GetVariableRulesOfTemplateModel;
}
