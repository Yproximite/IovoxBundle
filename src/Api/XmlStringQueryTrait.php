<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;

trait XmlStringQueryTrait
{
    public function executeXmlStringQuery(string $xmlPayload): bool
    {
        $query = $this->createQuery();
        $query->setContent($xmlPayload);
        $response = $this->client->executeQuery($query);
        if (static::EXPECTED_RESPONSE_STATUS_CODE === $response->getStatusCode()) {
            return true;
        }

        throw new BadResponseReturnException($response, $this->errorResults);
    }
}
