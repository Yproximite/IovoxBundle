<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\AccountSetup\Links;

interface DeleteLinksInterface
{
    public const QUERY_PARAMETER_LINK_IDS = 'link_ids';

    /**
     * @param array{ link_ids: non-empty-string } $queryParameters
     */
    public function executeQuery(array $queryParameters = []): bool;
}
